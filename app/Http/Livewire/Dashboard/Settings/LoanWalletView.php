<?php

namespace App\Http\Livewire\Dashboard\Settings;

use App\Models\LoanWallet;
use App\Traits\WalletTrait;
use Livewire\Component;

class LoanWalletView extends Component
{
    use WalletTrait;
    public $amount, $current_funds;
    public function render()
    {
        $this->current_funds = LoanWallet::get()->first();
        
        return view('livewire.dashboard.settings.loan-wallet-view')
        ->layout('layouts.dashboard');
    }

    public function store(){
        // dd($this->amount);
        LoanWallet::create([
            'deposit'=>$this->amount
        ]);
    }
}
