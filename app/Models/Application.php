<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'lname',
        'fname',
        'email',
        'phone',
        'gender',
        'type',
        'repayment_plan',
        'amount',
        'amount',
        'interest',
        'payback_amount',
        
        'glname',
        'gfname',
        'gemail',
        'gphone',
        'g_gender',
        'g_relation',

        'g2lname',
        'g2fname',
        'g2email',
        'g2phone',
        'g2_gender',
        'g2_relation',

        'nrc_file',
        'tpin_file',
        'business_file',
        'payslip_file',
        'bank_trans_file',
        'bill_file',
        'status',

        'user_id',
        'guest_id',
        'payback_amount',
        'penalty_addition',
        'due_date',
        'can_change',

        'monthly_payments',
        'maximum_deductable',
        'net_pay_blr', //net before loan recovery
        'net_pay_alr', //net pay after loan recovery
        'service_cost' 

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function loan_scores()
    {
        return $this->hasMany(LoanScore::class);
    }

    public static function payback($amount, $duration){
        $interest_rate = 20 / 100;
        return $amount * (1 + ($interest_rate * (int)$duration));
    }

    public static function monthly_installment($amount, $duration){
        $interest_rate = 20 / 100;
        $total_collectable = $amount * (1 + ($interest_rate * (int)$duration));

        return $total_collectable / $duration;
    }

    // COUNTS
    public static function totalLoans(){
        return Application::get()->count();
    }
    public static function totalRegisteredLoans(){
        return Application::where('complete', 1 )->get()->count();
    }
    public static function totalPendingLoans(){
        return Application::where('status', 0)->where('complete', 1)->get()->count();
    }


    // FUNDS
    public static function totalAmountLoans(){
        //  Total amount for all loans with complete KYC
        return Application::where('complete', 1)->sum('amount');
    }
    public static function totalAmountLoanedOut(){
        //  Total amount for complete and approved loans 
        return Application::where('complete', 1)->where('status', 1)->sum('amount');
    }
    public static function totalAmountPending(){
        // Total amount for complete and pending approval
        return Application::where('complete', 1)->where('status', 0)->sum('amount');
    }


    // ELIGIBILITY
    public static function isloan_eligible($loan){

        
        $basic_pay = $loan->user->basic_pay; // Clear
        $net_pay_blr = 0; //Unclear //Net Pay Before Loan Recovery
        $principal = $loan->amount; // Clear
        $interest = $loan->interest; // Clear
        $total_collectable = Application::payback($loan->amount, $loan->repayment_plan); // Clear
        $payment_period = $loan->repayment_plan; // Clear
        $monthly_payment = Application::monthly_installment($loan->amount, $loan->repayment_plan); // Clear
        $maximum_deductable_amount = $net_pay_blr * 0.75; // Clear
        $net_pay_alr = $net_pay_blr - $monthly_payment; //Net Pay After Loan Recovery //Clear
        $DOB = $loan->user->dob;
        $DOA = $loan->created_at; //Unclear
        $DOP = $loan->updated_at; //Unclear
        $credit_score = $monthly_payment > $maximum_deductable_amount;

        if($credit_score){
            return 1;
        }else{
            return 0;
        }
    }
    public static function loan_assemenent_table($loan){
        $data = [
            'basic_pay' => $loan->user->basic_pay, // Clear
            'net_pay_blr' => 0, //Unclear //Net Pay Before Loan Recovery
            'principal' => $loan->amount, // Clear
            'interest' => $loan->interest, // Clear
            'total_collectable' =>  Application::payback($loan->amount, $loan->repayment_plan), // Clear
            'payment_period' => $loan->repayment_plan, // Clear
            'monthly_payment' => $monthly_payment = Application::monthly_installment($loan->amount, $loan->repayment_plan), // Clear
            'maximum_deductable_amount' => $maximum_deductable_amount = $net_pay_blr * 0.75, // Clear
            'net_pay_alr' => $net_pay_blr - $monthly_payment, //Net Pay After Loan Recovery //Clear
            'dob' => $loan->user->dob,
            'doa' => $loan->created_at, //Unclear
            'dop' => $loan->updated_at, //Unclear
            'credit_score' => $monthly_payment > $maximum_deductable_amount ? 'Eligible' : 'Not Eligible'
        ];
        return $data;
    }
}
