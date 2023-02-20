<?php

namespace App\Traits;

use App\Mail\LoanApplication;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;

trait LoanTrait{
    use EmailTrait;
    public $application;

    // public function __construct(Application $a){
    //     $this->application = $a;
    // }

    public function get_loan_details($id){
        $data = Application::with('user')->where('id', $id)->first();
        return $data;
    }

    public function apply_loan($data){
            try {
                // check if user already created a loan application that is not approved yet and not complete
                $check = Application::where('email', $data['email'])
                                    ->where('status', 0)->where('complete', 0)->get();
                            
                
                $mail = [
                    'name' => $data['fname'].' '.$data['lname'],
                    'to' => $data['email'],
                    'from' => 'admin@bridgetrustfinance.co.zm',
                    'phone' => $data['phone'],
                    'subject' => 'Bridge Trust Finance Loan Application',
                    'message' => 'Hey '.$data['fname'].' '.$data['lname'].' Your loan request has been sent, please sign in to see the application status. Your password is 20230101brigde.@2you',
                ];
                
                if(!empty($check->toArray())){
                    $check->where('user_id', '=', $data['user_id'])->first()->update($data);
                    $contact_email = new LoanApplication($mail);
                    Mail::to($data['email'])->send($contact_email);
                }else{
                    $item = Application::create($data);
                    $contact_email = new LoanApplication($mail);
                    Mail::to($data['email'])->send($contact_email);
                }

            } catch (\Throwable $th) {
                dd($th);
            }
    }

    public function accept_loan($id){

    }

    public function reject_loan($id){

    }

    public function payback_loan($id){

    }

    public function search_loan($id){
        
    }

    public function payback_ammount($amount, $duration){
        $interest_rate = 20 / 100;
        return $amount * (1 + ($interest_rate * (int)$duration));
    }

    public function missed_repayments(){
        return Application::with('user')->where('next_paydate', '<', now())
        ->get();
    }
    public function past_maturity_date(){
        return Application::with('user')->where('due_date', '<', now())
        ->get();
    }

}