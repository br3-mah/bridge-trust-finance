<?php

namespace App\Http\Livewire\Dashboard\Borrowers;

use App\Models\Application;
use App\Models\User;
use App\Traits\EmailTrait;
use Livewire\Component;

class SendBorrowerMessageView extends Component
{
    use EmailTrait;
    public $subject, $message;
    public $users;
    public $to = [];

    public function render()
    {
        $this->users = User::latest()->role('user')->get();
        return view('livewire.dashboard.borrowers.send-borrower-message-view')
        ->layout('layouts.dashboard');
    }

    public function sendMessage(){
        
        // dd($this->to);
        try {
            foreach ($this->to as $uid) {
            
                $user = User::where('id', $uid)->with('active_loans')->get()->first();
                
                if ($user->active_loans !== "") {
                    $mail = [
                        'user_id' => $user->id,
                        'application_id' => $user->active_loans->id,
                        'name' => $user->fname.' '.$user->lname,
                        'loan_type' => $user->active_loans->type,
                        'phone' => $user->phone,
                        'email' => $user->email,
                        'duration' => $user->active_loans->repayment_plan.' Months',
                        'amount' => Application::payback($user->active_loans->amount, $user->active_loans->repayment_plan),
                        'type' => 'loan-remainder',
                        'msg' => $this->message,
                        'subject' => $this->subject
                    ];
                    
                    $resp = $this->send_loan_remainder($mail, $user);
                    if($resp){
                        session()->flash('success', 'Email sent successfully.');
                    }else{
                        session()->flash('error', 'There was something wrong. Message Failed');
                    }
                }else{
                    session()->flash('error', 'There was something wrong. Message Failed');
                }
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'There was something wrong. Message Failed');
        }
    }
}
