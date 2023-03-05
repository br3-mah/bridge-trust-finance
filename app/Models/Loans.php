<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'repaid',
        'principal',
        'payback',
        'penalty',
        'interest',
        'final_due_date',
        'grace_due_date',
        'closed'
    ];

    public static function customer_total_borrowed($user_id){
        $loans = Application::with('loan')
        ->where('status', 1)
        ->where('complete', 1)
        ->where('user_id', $user_id)->get();

        $total = 0;
        foreach ($loans as $key => $loan) {
            $total += Loans::where('application_id', $loan->id)->first()->principal;
        }
        
        return $total;
    }

    public static function customer_total_paid($user_id){
        $loans = Application::with('loan')
        ->where('status', 1)
        ->where('complete', 1)
        ->where('user_id', $user_id)->get();

        $amount_paid = 0;
        foreach ($loans as $key => $loan) {
            $amount_paid += Transaction::where('application_id', $loan->id)->first()->amount_settled;
        }
        
        return $amount_paid;
    }

    public static function customer_balance($user_id){
        
        $loans = Application::with('loan')
        ->where('status', 1)
        ->where('complete', 1)
        ->where('user_id', $user_id)->get();

        $payback = 0;
        $amount_paid = 0;
        foreach ($loans as $key => $loan) {
            $payback += Application::payback($loan->amount, $loan->duration);
            $amount_paid += Transaction::where('application_id', $loan->id)->first()->amount_settled;
        }
        
        return $payback - $amount_paid;
    }

    public function application(){
        return $this->belongsTo(Application::class, 'application_id');
    }
    public function loan_installments(){
        return $this->hasMany(LoanInstallment::class);
    }


}
