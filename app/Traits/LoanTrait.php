<?php

namespace App\Traits;

use App\Mail\LoanApplication;
use App\Models\Application;
use App\Models\LoanInstallment;
use App\Models\LoanPackage;
use App\Models\Loans;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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
                    'message' => 'Hey '.$data['fname'].' '.$data['lname'].', Thank you for choosing us as your lender and for your trust in our services. We appreciate your business and are committed to providing you with the best possible experience throughout your loan term Your loan request has been sent, please sign in to see the application status.',
                ];
                
                if(!empty($check->toArray())){
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

    public function make_loan($x, $due_date){
        try {
            if($due_date !== ''){
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
            
            for ($i=0; $i <= $x->repayment_plan; $i++) { 
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