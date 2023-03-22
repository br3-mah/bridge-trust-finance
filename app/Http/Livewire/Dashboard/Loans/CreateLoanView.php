<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use Livewire\Component;

class CreateLoanView extends Component
{
    use AuthorizesRequests;
    public $users, $user_basic_pay, $user_net_pay;
    public function render()
    {
        
        $this->authorize('accept and reject loan requests');
        $this->users = User::role('user')->without('applications')->get();
        return view('livewire.dashboard.loans.create-loan-view')->layout('layouts.dashboard');
    }

    public function updated($fieldName)
    {
        dd($fieldName);
        if ($fieldName === 'name') {
            // Run your code here
            $this->myFunction();
        }
    }
}
