<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use Livewire\Component;

class CreateLoanView extends Component
{
    use AuthorizesRequests;
    public $users;
    public function render()
    {
        
        $this->authorize('accept and reject loan requests');
        $this->users = User::role('user')->without('applications')->get();
        return view('livewire.dashboard.loans.create-loan-view')->layout('layouts.dashboard');
    }
}
