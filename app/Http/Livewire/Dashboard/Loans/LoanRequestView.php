<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use App\Models\User;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;
use Livewire\Component;

class LoanRequestView extends Component
{
    use EmailTrait, WalletTrait;
    public $loan_requests, $loan_request;
    public $type = [];
    public $status = [];
    public $view = 'table';
    public $users;

    public function render()
    {
        $this->users = User::role('user')->without('applications')->get();
        $loan_requests = Application::query();
        if(auth()->user()->can('view all loan requests')){
            if ($this->type) {
                $loan_requests->whereIn('type', $this->type)->orderBy('created_at', 'desc');
            }
    
            if ($this->status) {
                $loan_requests->whereIn('status', $this->status)->orderBy('created_at', 'desc');
            }
            $this->loan_requests = $loan_requests->where('complete', 1)->get();
        }else{
            $this->loan_requests = Application::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }
        return view('livewire.dashboard.loans.loan-request-view')
        ->layout('layouts.dashboard');
    }

    public function changeView($view){
        $this->view = $view;
    }

    public function accept($id){
        try {
            $x = Application::find($id);
            if($this->isCompanyEnough($x->amount)){
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
                session()->flash('success', 'Successfully transfered '.$x->amount.' to '.$x->fname.' '.$x->lname);
            }else{
                session()->flash('warning', 'Insuficient funds in the company account, please update funds.');
            }
            
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.'.$th);
        }
    }


    public function acceptOnly($id){
        try {
            $x = Application::find($id);
            if($this->isCompanyEnough($x->amount)){
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
                $this->send_loan_feedback_email($mail);
                session()->flash('success', 'Successfully approved');
            }else{
                session()->flash('warning', 'Insuficient funds in the company account, please update funds.');
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }


    public function stall($id){
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
            session()->flash('info', 'Application is under review.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
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
            $this->withdraw($x->amount, $x);
            $this->send_loan_feedback_email($mail);
            session()->flash('success', 'Loan has been rejected');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }



    public function destroy($id){
        Application::where('id', $id)->first()->delete();
        session()->flash('success', 'Deleted permanently');
    }
}
