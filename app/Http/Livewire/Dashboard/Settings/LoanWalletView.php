<?php

namespace App\Http\Livewire\Dashboard\Settings;

use App\Models\LoanWallet;
use App\Models\LoanWalletHistory;
use App\Traits\WalletTrait;
use Livewire\Component;
use Livewire\WithPagination;

class LoanWalletView extends Component
{
    use WalletTrait, WithPagination;
    public $amount, $current_funds, $gross_funds, $account, $history;
    public function render()
    {
        $this->history = LoanWalletHistory::with('users')->orderBy('created_at', 'desc')->get();
        $this->account = LoanWallet::first();
        $this->current_funds = $this->getCompanyWallet();
        $this->gross_funds = LoanWallet::first()->deposit ?? 0;
        return view('livewire.dashboard.settings.loan-wallet-view')
        ->layout('layouts.dashboard');
    }

    public function store(){
        // dd($this->amount);
        if(!empty(LoanWallet::get()->toArray())){
            $data = LoanWallet::first()->update([
                'deposit'=> $this->account->deposit + $this->amount
            ]);
            LoanWalletHistory::create([
                'desc' => 'Updated Funds',
                'amount' => $this->amount,
                'user_id' => auth()->user()->id,
                'loan_wallet_id' => $this->account->id
            ]);
            
            session()->flash('success', 'Successfully updated K'.$this->amount.' into the Account Funds');
            $this->render();
        }else{
            $data = LoanWallet::create([
                'deposit'=>$this->amount
            ]);
            LoanWalletHistory::create([
                'desc' => 'Updated Funds',
                'amount' => $this->amount,
                'user_id' => auth()->user()->id,
                'loan_wallet_id' => $this->account->id
            ]);
            
            session()->flash('success', 'Successfully deposited K'.$this->amount.' into the Account Funds');
            $this->render();
        }
    }
}
