<?php

namespace App\Traits;

use App\Models\Application;

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
                // dd($check->toArray());
                // dd(!empty($check->toArray()));
                if(!empty($check->toArray())){
                    // Update record
                    $check->where('email', '=', $data['email'])->first()->update($data);
                    $mail = [
                        'name' => $data['name'],
                        'to' => $data['email'],
                        'from' => 'support@bridgetrustfinance.co.zm',
                        'phone' => $data['phone'],
                        'subject' => 'Bridge Trust Finance Loan Application Updated',
                        'message' => 'Hey '.$data['fname'].' Your Current pending loan application has been updated, please sign up or sign in to see the application status',
                    ];
                    $this->send_loan_feedback_email($mail);
                    return $check->first()->id;
                }else{
                    $item = Application::create($data);
                    $mail = [
                        'name' => $data['name'],
                        'to' => $data['email'],
                        'from' => 'support@bridgetrustfinance.co.zm',
                        'phone' => $data['phone'],
                        'subject' => 'Bridge Trust Finance '.$data['type'].' Loan Application',
                        'message' => 'Hey '.$data['fname'].' Your '.$data['type'].' loan application of K'.$data['amount'].' for '.$data['repayment_plan'].' payback duration, has been successfully sent, please sign up or sign in to see the application status',
                    ];
                    $this->send_loan_feedback_email($mail);
                    return $item->id;
                }
            } catch (\Throwable $th) {
                return false;
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