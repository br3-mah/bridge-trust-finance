<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Loans;
use Livewire\Component;

class LoanRepaymentView extends Component
{
    public $loan_requests;
    public function render()
    {
        $this->loan_requests = Loans::with('application')->where('closed', 1)->get();
        return view('livewire.dashboard.loans.loan-repayment-view')
        ->layout('layouts.dashboard');
    }
}
