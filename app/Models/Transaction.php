<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_no',
        'amount_settled',
        'transaction_fee',
        'profit_margin',
        'charge_amount',
        'installment_id'
    ];

    public function installment(){
        return $this->belongsTo(LoanInstallment::class, 'installment_id');
    }
}
