<?php

namespace App\Http\Livewire\Dashboard\Borrowers;

use App\Models\Application;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

class LoanStatementView extends Component
{
    public $loan, $transactions;
    public function mount($id){
        /**
            *loan main details
            *Loan owner
            *Loan status timeline
        **/  
        $this->loan = Application::where('id', $id)->with('user')->first();
        $this->transactions = Transaction::where('application_id', $id)->with('application.user')->orderBy('created_at', 'desc')->get();
        
    }

    public function render()
    {
        return view('livewire.dashboard.borrowers.loan-statement-view')
        ->layout('layouts.dashboard');
    }
}
