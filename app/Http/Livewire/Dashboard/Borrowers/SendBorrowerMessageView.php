<?php

namespace App\Http\Livewire\Dashboard\Borrowers;

use App\Models\User;
use Livewire\Component;

class SendBorrowerMessageView extends Component
{
    public $name, $fname, $lname, $phone, $address, $occupation, $nrc, $dob, $profile_photo_path, $gender, $loan_status, $basic_pay, $email;
    public $users, $channel;

    public function render()
    {
        $this->users = User::latest()->role('user')->get();
        return view('livewire.dashboard.borrowers.send-borrower-message-view')
        ->layout('layouts.dashboard');
    }

    public function sendMessage(){

    }
}
