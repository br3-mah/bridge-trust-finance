<?php

namespace App\Traits;

use App\Jobs\SendLoanRequestEmailJob;
use App\Models\Application;
use App\Models\User;
use App\Notifications\BTFLoanRequest;
use Illuminate\Support\Facades\Notification;

trait EmailTrait{


    public function send_contact_email($details){
        try {
            dispatch(new SendLoanRequestEmailJob($details));
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function send_loan_email($data){
        $admin = User::first();
        try {
            Notification::send($admin, new BTFLoanRequest($data));
            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }

}