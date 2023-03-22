<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Classes\Exports\ClosedLoanExport;
use App\Models\Application;
use App\Models\Loans;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ClosedLoanView extends Component
{
    public $loan_requests;
    public function render()
    {
        $this->loan_requests = Loans::with('application')->where('closed', 1)->get();
        return view('livewire.dashboard.loans.closed-loan-view')
        ->layout('layouts.dashboard');
    }

    public function exportClosedLoans(){
        return Excel::download(new ClosedLoanExport(), 'Closed Loans.xlsx');
    }
}
