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
        'closed'
    ];

    public function application(){
        return $this->belongsTo(Application::class, 'application_id');
    }
    public function loan_installments(){
        return $this->hasMany(LoanInstallment::class);
    }


}
