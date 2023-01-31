<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class LoanRepaymentCalculatorView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.loans.loan-repayment-calculator-view')
        ->layout('layouts.dashboard');
    }
}
