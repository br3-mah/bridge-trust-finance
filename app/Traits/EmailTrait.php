<?php

namespace App\Traits;

use App\Jobs\SendLoanRequestEmailJob;
use App\Mail\LoanApplication;
use App\Mail\LoanEquiry;
use App\Models\Application;
use App\Models\User;
use App\Notifications\BTFLoanRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

trait EmailTrait{

    // This email send a contact message from contact us page /////////////
    public function send_contact_email($details){
        try {
            dispatch(new SendLoanRequestEmailJob($details));
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    // This email notifies the administrator about a new loan request //////////////////
    public function send_loan_email($data){
        $admin = User::first();
        try {
            Notification::send($admin, new BTFLoanRequest($data));
            return true;
        } catch (\Throwable $th) {
            return $th;
        }

    }

    // This email notifies the customer email that their application for a loan has been sumbitted //////
    public function send_loan_feedback_email($data){
        try {
            $contact_email = new LoanApplication($data);
            Mail::to($data['email'])->send($contact_email);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


    // This email sends details to the administrator for prospect customer loan enqury
    public function send_loan_enquiry($data){
        $admin = User::first();
        try {
            Mail::to($admin->email)->send(new LoanEquiry($data));
        } catch (\Throwable $th) {
            return $th;
        }
    } 

}