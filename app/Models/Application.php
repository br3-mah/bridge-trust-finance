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

        'processed_by',
        'approved_by',

        'monthly_payments',
        'maximum_deductable',
        'net_pay_blr', //net before loan recovery
        'net_pay_alr', //net pay after loan recovery
        'service_cost' 

    ];
    protected $appends = [
        'done_by',
        'confirmed_by'
    ];

    public function getDoneByAttribute(){
        return User::where('id', $this->processed_by)->first();
    }

    public function getConfirmedByAttribute(){
        // must change to loan
        return User::where('id', $this->processed_by)->first();
    }

    public function loan(){
        return $this->hasOne(Loans::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function loan_scores()
    {
        return $this->hasMany(LoanScore::class);
    }

    public function approvedLoans(){
        return $this->hasOne(Loans::class);
    }

    // public function approvalAction(){
    //     return $this->hasMany()
    // }

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
    public static function totalApprovedLoans(){
        return Application::where('status', 1 )->get()->count();
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
        return Application::where('complete', 1)->where('status', 1)->whereNotNull('due_date')->sum('amount');
    }
    public static function totalAmountPending(){
        // Total amount for complete and under review / pending approval
        return Application::where('complete', 1)->where('status', [0, 2])->sum('amount');
    }


    // ELIGIBILITY
    public static function isloan_eligible($loan){
        $basic_pay = $loan->user->basic_pay; // Clear
        $net_pay_blr = $loan->user->net_pay; //Unclear //Net Pay Before Loan Recovery
        $principal = $loan->amount; // Clear
        $interest = $loan->interest; // Clear
        $total_collectable = Application::payback($loan->amount, $loan->repayment_plan); // Clear
        $payment_period = $loan->repayment_plan; // Clear
        $monthly_payment = Application::monthly_installment($loan->amount, $loan->repayment_plan); // Clear
        $maximum_deductable_amount = $net_pay_blr * 0.75; // Clear
        $net_pay_alr = $net_pay_blr - $monthly_payment; //Net Pay After Loan Recovery //Clear
        $credit_score = $monthly_payment > $maximum_deductable_amount;

        if($credit_score){
            return 'Eligible';
        }else{
            return 'Not Eligible';
        }
    }

    public static function loan_assemenent_table($loan){
        
        $data = [
            'borrower' => $loan->user->fname.' '.$loan->user->lname,
            'basic_pay' => $loan->user->basic_pay, // Clear
            'net_pay_blr' => $loan->user->net_pay, //Unclear //Net Pay Before Loan Recovery
            'principal' => $loan->amount, // Clear
            'interest' => $loan->interest, // Clear
            'total_collectable' =>  Application::payback($loan->amount, $loan->repayment_plan), // Clear
            'payment_period' => $loan->repayment_plan, // Clear
            'monthly_payment' =>  Application::monthly_installment($loan->amount, $loan->repayment_plan), // Clear
            'maximum_deductable_amount' => $maximum_deductable_amount = $loan->user->net_pay * 0.75, // Clear
            'net_pay_alr' => $loan->user->net_pay - Application::monthly_installment($loan->amount, $loan->repayment_plan), //Net Pay After Loan Recovery //Clear
            'dob' => $loan->user->dob,
            'doa' => $loan->created_at->toFormattedDateString(), //Date of Application
            'dop' => '', //Date of Payment
            'credit_score' => Application::monthly_installment($loan->amount, $loan->repayment_plan) > $maximum_deductable_amount ? 'Eligible' : 'Not Eligible'
        ];

        return $data;
    }
}
