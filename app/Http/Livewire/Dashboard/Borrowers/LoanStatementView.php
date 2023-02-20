<?php

namespace App\Http\Livewire\Dashboard\Borrowers;

use App\Models\Application;
use App\Models\User;
use Livewire\Component;

class LoanStatementView extends Component
{
    public $loan;
    public function mount($id){
        /**
            *loan main details
            *Loan owner
            *Loan status timeline
        **/  
        $this->loan = Application::where('id', $id)->with('user')->first();
    }

    public function render()
    {
        return view('livewire.dashboard.borrowers.loan-statement-view')
        ->layout('layouts.dashboard');
    }
}
