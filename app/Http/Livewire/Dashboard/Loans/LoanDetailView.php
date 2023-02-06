<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class LoanDetailView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.loans.loan-detail-view')
        ->layout('layouts.dashboard');
    }
}
