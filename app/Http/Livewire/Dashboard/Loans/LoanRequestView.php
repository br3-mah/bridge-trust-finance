<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;
use Livewire\Component;

class LoanRequestView extends Component
{
    use EmailTrait, WalletTrait;
    public $loan_requests, $loan_request;
    public $type = [];
    public $status = [];
    public function render()
    {
        $loan_requests = Application::query();
        // $users = User::query();


        if(auth()->user()->can('view all loan requests')){
            if ($this->type) {
                $loan_requests->whereIn('type', $this->type)->orderBy('created_at', 'desc');
            }
    
            if ($this->status) {
                $loan_requests->whereIn('status', $this->status)->orderBy('created_at', 'desc');
            }
    
            $this->loan_requests = $loan_requests->get();
        }else{
            $this->loan_requests = Application::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }
        return view('livewire.dashboard.loans.loan-request-view')
        ->layout('layouts.dashboard');
    }

    public function accept($id){
        try {
            $x = Application::find($id);
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

    public function destroy($id){
        Application::where('id', $id)->first()->delete();
    }
}
