<?php

namespace App\Traits;

use App\Mail\LoanApplication;
use App\Models\Application;
use App\Models\LoanInstallment;
use App\Models\LoanPackage;
use App\Models\Loans;
use App\Models\User;
use App\Notifications\LoanRequestNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

trait LoanTrait{
    use EmailTrait;
    public $application;

    // public function __construct(Application $a){
    //     $this->application = $a;
    // }

    public function getLoanPackages(){
        return LoanPackage::orderBy('created_at', 'desc')->get();
    }

    public function removeLoanPackage($id){
        $package = LoanPackage::find($id); 
        if ($package) {
            $package->delete();
            return true;
        } else {
            return false;
        }
    }

    public function get_loan_details($id){
        $data = Application::with('user.nextkin')->where('id', $id)->first();
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
                    'message' => 'Hey '.$data['fname'].' '.$data['lname'].', Thank you for choosing us as your lender and for your trust in our services. We appreciate your business and are committed to providing you with the best possible experience throughout your loan term Your loan request has been sent, please sign in to see the application status. Your username is '.$data['email'].' and Default Password is 20230101bridge.@2you',
                ];
                
                if(!empty($check->toArray())){
                    $mail['message'] = 'Your Loan has been Updated';
                    $check->first()->update($data);
                    $contact_email = new LoanApplication($mail);
                    Mail::to($data['email'])->send($contact_email);
                    return $check->id;
                }else{
                    $item = Application::create($data);
                    $contact_email = new LoanApplication($mail);
                    Mail::to($data['email'])->send($contact_email);
                    return $item->id;
                }

            } catch (\Throwable $th) {
                dd($th);
            }
    }

    public function apply_update_loan($data, $loan_id){
            try {
                // check if user already created a loan application that is not approved yet and not complete
                $check = Application::where('id', $loan_id)->first();
                $mail = [
                    'name' => $data['fname'].' '.$data['lname'],
                    'to' => $data['email'],
                    'from' => 'admin@bridgetrustfinance.co.zm',
                    'phone' => $data['phone'],
                    'subject' => 'Bridge Trust Finance Loan Application',
                    'message' => 'Hey '.$data['fname'].' '.$data['lname'].', Your loan details have been updated',
                ];
                
                if(!empty($check->toArray())){
                    $check->update($data);
                    $contact_email = new LoanApplication($mail);
                    Mail::to($data['email'])->send($contact_email);
                    return $check->id;
                }

            } catch (\Throwable $th) {
                return 0;
            }
    }

    public function remake_loan($loan_id, $new_due_date){
        $x = Application::where('id', $loan_id)->first();
        Loans::where('application_id', '=', $loan_id)->delete();
        $this->make_loan($x, $new_due_date);
    }

    public function make_loan($x, $due_date){
        // dd($due_date !== null);
        try {
            if($due_date !== null){
                $due = $due_date.' 00:00:00';
            }else{
                $due = Carbon::now()->addMonth($x->repayment_plan);
            }
            $loan = Loans::create([
                'application_id' => $x->id,
                'repaid' => 0,
                'principal' => $x->amount ?? 0,
                'payback' => $x->amount * 0.2,
                'penalty' => 0,
                'interest' => $x->interest ?? 20,
                'final_due_date' => $due,
                'closed' => 0
            ]);
    
            $payback_amount = Application::payback($x->amount, $x->repayment_plan);
            $installments = $payback_amount / $x->repayment_plan;
            
            for ($i=0; $i < $x->repayment_plan; $i++) { 
                $next_due = Carbon::now()->addMonth($i);
                LoanInstallment::create([
                    'loan_id' => $loan->id, 
                    'next_dates' => $next_due, 
                    'amount' => $installments
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function notify_loan_request($data){

        $admin = User::where('id', $data['user_id']);
        try {
            Notification::send($admin, new LoanRequestNotification($data));
            return true;
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function payback_ammount($amount, $duration){
        $interest_rate = 20 / 100;
        return $amount * (1 + ($interest_rate * (int)$duration));
    }

    public function missed_repayments(){
        return Application::with(['loan.loan_installments' => function ($query) {
            $query->where('next_dates', '<', now())
                ->whereNull('paid_at');
        }]) ->where('status', 1)->where('complete', 1)->get();
    }
    public function past_maturity_date(){
        return Application::with(['loan' => function ($query) {
            $query->where('final_due_date', '<', now());
        }])->with('user')->where('status', 1)->where('complete', 1)->get();
    }

}