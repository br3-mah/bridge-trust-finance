<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use App\Classes\Exports\TransactionExport;
use App\Models\LoanInstallment;
use App\Models\Loans;
use App\Models\Transaction;
use App\Traits\WalletTrait;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class MakePaymentView extends Component
{
    use WalletTrait;
    public $amount, $loan_id, $loans, $transactions;

    public function render()
    {
        $this->loans = Loans::with('application')->get();
        $this->transactions = Transaction::with('application.user')->orderBy('created_at', 'desc')->get();
        return view('livewire.dashboard.accounts.make-payment-view')
        ->layout('layouts.dashboard');
    }

    public function makepayment(){     
        DB::beginTransaction();
        try {
            // Insert in main wallet
            $this->repayLoanWalletFunds($this->amount);

            // Update Borrower Balance
            $borrower_loan = Loans::where('id', $this->loan_id)->with('application')->first();
            $borrower_loan->payback = $borrower_loan->payback - $this->amount;
            $borrower_loan->save();

            // Transactio history
            Transaction::create([
                'application_id' => $borrower_loan->application->id,
                'amount_settled' => $this->amount,
                'transaction_fee' => 0,
                'profit_margin' => $this->amount,
                'proccess_by' => auth()->user()->fname.' '.auth()->user()->lname,
                'charge_amount' => $borrower_loan->payback 
            ]);

            // Update Installment
            $installment = LoanInstallment::where('loan_id', $borrower_loan->id)->whereNull('paid_at')->first();
            $installment->paid_at = Carbon::now();
            $installment->save();

            DB::commit();
            session()->flash('success', 'Successfully repaid '.$this->amount);
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }

    public function exportTransanctions(){
            return Excel::download(new TransactionExport, 'Transaction Log.xlsx');
    }
}
