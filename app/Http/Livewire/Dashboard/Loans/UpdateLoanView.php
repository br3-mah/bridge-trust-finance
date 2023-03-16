<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use App\Models\User;
use Livewire\Component;

class UpdateLoanView extends Component
{

    public $data, $loan, $user;
    public $loan_type = '';
    public function mount($id){
        $this->loan = Application::with('loan')->where('id', $id)->first();
        $this->user = User::with('nextkin')->where('id', $this->loan->user_id)->first();
        
    }

    public function render()
    {
        $this->loan_type = $this->loan->type;
        return view('livewire.dashboard.loans.update-loan-view')
        ->layout('layouts.dashboard');
    }
}
