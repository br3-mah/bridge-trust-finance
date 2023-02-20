<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'name',
        'phone1',
        'phone2',
        'phone3',
        'address',
        'province',
        'state',
        'city',
        'country',
        'business_type',
        'legal_structure',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'email1',
        'email2'
    ];
}
