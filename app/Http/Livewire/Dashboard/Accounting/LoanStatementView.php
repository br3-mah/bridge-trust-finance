<?php

namespace App\Http\Livewire\Dashboard\Accounting;

use Livewire\Component;

class LoanStatementView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.accounting.loan-statement-view')
        ->layout('layouts.dashboard');
    }
}
