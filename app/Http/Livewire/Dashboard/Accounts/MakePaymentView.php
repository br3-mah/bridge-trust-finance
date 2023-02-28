<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use App\Models\Loans;
use App\Models\Transaction;
use App\Traits\WalletTrait;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

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
        // DB::beginTransaction();
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

            // DB::commit();
            session()->flash('success', 'Successfully repaid '.$this->amount);
        } catch (\Throwable $th) {
            // DB::rollback();
            dd($th);
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }
}
