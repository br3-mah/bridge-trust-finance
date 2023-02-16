<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use Illuminate\Http\Client\Request;
use Livewire\Component;

class LoanDetailView extends Component
{
    use EmailTrait, LoanTrait;
    public $loan, $user, $loan_id, $msg;

    public function mount($id){
        /**
            *loan main details
            *Loan owner
            *Loan status timeline
        **/  
        $this->loan_id = $id;
    }

    public function render()
    {
        $this->loan = $this->get_loan_details($this->loan_id);
        return view('livewire.dashboard.loans.loan-detail-view')
        ->layout('layouts.dashboard');
    } 

    public function confirm($id, $msg){
        $this->loan_id = $id;
        $this->msg = $msg;
    }

    public function clear(){
        $this->loan_id = '';
        $this->msg = '';
    }
    
    public function accept(){
        dd('ere');
        try {
            $x = Application::find($this->loan_id);
            $x->status = 1;
            $x->save();
            $mail = [
                'user_id' => '',
                'application_id' => $x->id,
                'name' => $x->fname.' '.$x->lname,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application request has been successfully accepted'
            ];
            $this->deposit($x->amount, $x);
            $this->send_loan_feedback_email($mail);
            $this->render();
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function stall($id){
        // set under review
        try {
            $x = Application::find($id);
            $x->status = 2;
            $x->save();
            
            $mail = [
                'user_id' => '',
                'application_id' => $x->id,
                'name' => $x->fname.' '.$x->lname,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application is under review'
            ];
            $this->send_loan_feedback_email($mail);
            $this->render();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function reject($id){
        try {
            $x = Application::find($id);
            $x->status = 3;
            $x->save();
            
            $mail = [
                'user_id' => '',
                'application_id' => $x->id,
                'name' => $x->fname.' '.$x->lname,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application request has been rejected'
            ];
            $this->send_loan_feedback_email($mail);

        } catch (\Throwable $th) {
            dd($th);
        }
    }


}
