<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRate extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'value', 'for', 'type', 'status'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
