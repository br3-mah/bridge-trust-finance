<?php

namespace App\Http\Livewire;

use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class WelcomePage extends Component
{
    use LoanTrait, EmailTrait, WithFileUploads;

    public $lname, $fname, $email, $phone, $gender, $type, $repayment_plan, $amount;
    public $glname, $gfname, $gemail, $gphone, $g_gender, $g_relation;
    public $g2lname, $g2fname, $g2email, $g2phone, $g2_gender, $g2_relation;
    public $nrc_file, $tpin_file, $business_file, $payslip_file, $bank_trans_file, $bill_file;
    public $step_1_title = 'Loan Details';

    public function render()
    {
        return view('livewire.welcome-page');
    }

    public function submit(){
        
        $data = [
            'lname'=> $this->lname,
            'fname'=> $this->fname,
            'email'=> $this->email,
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
            'g2_relation'=> $this->g2_relation
        ];

        $files = [
            'nrc_file' => $this->nrc_file,
            'tpin_file' => $this->tpin_file,
            'business_file' => $this->business_file,
            'payslip_file' => $this->payslip_file,
            'bank_trans_file' => $this->bank_trans_file,
            'bill_file' => $this->bill_file,
        ];

        $application = $this->apply_loan($data);
        $mail = [
            'user_id' => auth()->user()->id,
            'appilcation_id' => $application->id,
            'name' => auth()->user()->fname.' '.auth()->user()->lname,
            'type' => 'loan-application',
            'msg' => 'You have new loan application request, please visit the site to view more details'
        ];
        $this->send_loan_email($mail);
        $this->clearForm();
    }

    public function clearForm(){
        $this->lname=''; $this->fname=''; $this->email=''; $this->phone=''; $this->gender=''; $this->type=''; $this->repayment_plan=''; $this->amount = '';
        $this->glname=''; $this->gfname=''; $this->gemail=''; $this->gphone=''; $this->g_gender=''; $this->g_relation='';
        $this->g2lname=''; $this->g2fname=''; $this->g2email=''; $this->g2phone=''; $this->g2_gender=''; $this->g2_relation;
    }
}
