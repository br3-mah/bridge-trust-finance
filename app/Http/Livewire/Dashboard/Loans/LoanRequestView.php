<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class LoanRequestView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.loans.loan-request-view')
        ->layout('layouts.dashboard');
    }
}
