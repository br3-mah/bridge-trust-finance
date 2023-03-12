<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\User;
use Livewire\Component;

class CreateLoanView extends Component
{
    public $users;
    public function render()
    {
        $this->users = User::role('user')->without('applications')->get();
        return view('livewire.dashboard.loans.create-loan-view')->layout('layouts.dashboard');
    }
}
