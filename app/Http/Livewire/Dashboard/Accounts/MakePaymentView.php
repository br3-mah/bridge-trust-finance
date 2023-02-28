<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use Livewire\Component;

class MakePaymentView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.accounts.make-payment-view')
        ->layout('layouts.dashboard');
    }

    
}
