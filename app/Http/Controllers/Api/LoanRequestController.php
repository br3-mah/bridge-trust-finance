<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanRequestController extends Controller
{
    public function store(Request $request){

        dd($request);
        $data = [
            //     'lname'=> $this->lname,
            //     'fname'=> $this->fname,
            //     'email'=> $this->email,
            //     'amount'=> $this->amount,
            //     'phone'=> $this->phone,
            //     'gender'=> $this->gender,
            //     'type'=> $this->type,
            //     'repayment_plan'=> $this->repayment_plan,
    
            //     'glname'=> $this->glname,
            //     'gfname'=> $this->gfname,
            //     'gemail'=> $this->gemail,
            //     'gphone'=> $this->gphone,
            //     'g_gender'=> $this->g_gender,
            //     'g_relation'=> $this->g_relation,
    
            //     'g2lname'=> $this->g2lname,
            //     'g2fname'=> $this->g2fname,
            //     'g2email'=> $this->g2email,
            //     'g2phone'=> $this->g2phone,
            //     'g2_gender'=> $this->g2_gender,
            //     'g2_relation'=> $this->g2_relation,
            // ];
            // $application = $this->apply_loan($data);
            // $mail = [
            //     'user_id' => '',
            //     'application_id' => $application,
            //     'name' => $this->fname.' '.$this->lname,
            //     'loan_type' => $this->type,
            //     'phone' => $this->phone,
            //     'duration' => $this->repayment_plan,
            //     'amount' => $this->amount,
            //     'type' => 'loan-application',
            //     'msg' => 'You have new a '.$this->type.' loan application request, please visit the site to view more details'
            // ];
    
            // $process = $this->send_loan_email($mail);
            // if($process){
            //     return redirect()->to('/successfully-applied-a-loan');
            // }else{
            //     return redirect()->to('/contact-us');
            // }
        ];
    }
}
