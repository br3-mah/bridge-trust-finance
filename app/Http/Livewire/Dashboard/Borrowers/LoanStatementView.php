<?php

namespace App\Http\Livewire\Dashboard\Borrowers;

use App\Models\User;
use Livewire\Component;

class LoanStatementView extends Component
{
    public $user;
    public function mount($id){
        /**
            *loan main details
            *Loan owner
            *Loan status timeline
        **/  
        $this->user = User::where('id', $id)->with('loans')->first();
    }

    public function render()
    {
        return view('livewire.dashboard.borrowers.loan-statement-view')
        ->layout('layouts.dashboard');
    }
}
