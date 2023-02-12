<?php

namespace App\Http\Livewire;

use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class WelcomePage extends Component
{
    use LoanTrait, EmailTrait, WithFileUploads;

    public $class, $style, $step;
    public $lname, $fname, $email, $phone, $gender, $type, $repayment_plan, $amount;
    public $glname, $gfname, $gemail, $gphone, $g_gender, $g_relation;
    public $g2lname, $g2fname, $g2email, $g2phone, $g2_gender, $g2_relation;
    // public $nrc_file, $tpin_file, $business_file, $payslip_file, $bank_trans_file, $bill_file;
    public $step_1_title = 'Loan Details';

    public function render()
    {
        // $this->class = 'show'; $this->style = 'display:block';
        return view('livewire.welcome-page');
    }

    public function updated(){
    //    dd($this->fname);
        // Create a loan application
        $data = [
            'lname'=> $this->lname,
            'fname'=> $this->fname,
            'email'=> $this->email,
            'amount'=> $this->amount,
            'phone'=> $this->phone,
            'gender'=> $this->gender,
            'type'=> $this->type,
            'repayment_plan'=> $this->repayment_plan,

            'glname'=> $this->glname,
            'gfname'=> $this->gfname,
            'gemail'=> $this->gemail,
            'gphone'=> $this->gphone,
            'g_gender'=> $this->g_gender,
            'g_relation'=> $this->g_relation,

            'g2lname'=> $this->g2lname,
            'g2fname'=> $this->g2fname,
            'g2email'=> $this->g2email,
            'g2phone'=> $this->g2phone,
            'g2_gender'=> $this->g2_gender,
            'g2_relation'=> $this->g2_relation,

            // 'nrc_file' => $nrc_file,
            // 'tpin_file' => $tpin_file,
            // 'payslip_file' => $payslip_file
            // 'bank_trans_file' => $this->bank_trans_file,
            // 'bill_file' => $this->bill_file,
            // 'business_file' => $this->business_file,
        ];
        $this->apply_loan($data);
    }

    // public function updating(){
    //     dd('updating');
    // }


    public function submit(Request $request){
        // $this->class = 'show'; $this->style = 'display:block';
        // $this->validate([
        //     'nrc_file' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024', 
        //     'tpin_file' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024', 
        //     'payslip_file' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024', 
        // ]);
 
        // $nrc_file = $this->nrc_file->store('applicant_doc');
        // $tpin_file = $this->tpin_file->store('applicant_doc');
        // $payslip_file = $this->payslip_file->store('applicant_doc');

        $data = [
            'lname'=> $this->lname,
            'fname'=> $this->fname,
            'email'=> $this->email,
            'amount'=> $this->amount,
            'phone'=> $this->phone,
            'gender'=> $this->gender,
            'type'=> $this->type,
            'repayment_plan'=> $this->repayment_plan,

            'glname'=> $this->glname,
            'gfname'=> $this->gfname,
            'gemail'=> $this->gemail,
            'gphone'=> $this->gphone,
            'g_gender'=> $this->g_gender,
            'g_relation'=> $this->g_relation,

            'g2lname'=> $this->g2lname,
            'g2fname'=> $this->g2fname,
            'g2email'=> $this->g2email,
            'g2phone'=> $this->g2phone,
            'g2_gender'=> $this->g2_gender,
            'g2_relation'=> $this->g2_relation,

            // 'nrc_file' => $nrc_file,
            // 'tpin_file' => $tpin_file,
            // 'payslip_file' => $payslip_file
            // 'bank_trans_file' => $this->bank_trans_file,
            // 'bill_file' => $this->bill_file,
            // 'business_file' => $this->business_file,
        ];
        $application = $this->apply_loan($data);
        // dd($application);
        $mail = [
            'user_id' => '',
            'application_id' => $application,
            'name' => $this->fname.' '.$this->lname,
            'loan_type' => $this->type,
            'phone' => $this->phone,
            'duration' => $this->repayment_plan,
            'amount' => $this->amount,
            'type' => 'loan-application',
            'msg' => 'You have new a '.$this->type.' loan application request, please visit the site to view more details'
        ];

        $process = $this->send_loan_email($mail);
        if($process){
            return redirect()->to('/successfully-applied-a-loan');
        }else{
            return redirect()->to('/contact-us');
        }
    }

    public function clearForm(){
        $this->lname=''; $this->fname=''; $this->email=''; $this->phone=''; $this->gender=''; $this->type=''; $this->repayment_plan=''; $this->amount = '';
        $this->glname=''; $this->gfname=''; $this->gemail=''; $this->gphone=''; $this->g_gender=''; $this->g_relation='';
        $this->g2lname=''; $this->g2fname=''; $this->g2email=''; $this->g2phone=''; $this->g2_gender=''; $this->g2_relation;
    }
}
