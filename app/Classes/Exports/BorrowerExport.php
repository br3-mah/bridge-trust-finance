<?php

namespace App\Classes\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BorrowerExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::get([
            'id', 
            'fname', 
            'lname', 
            'phone', 
            'email', 
            'address', 
            'occupation', 
            'dob', 
            'gender', 
            'id_type', 
            'nrc_no', 
            'basic_pay', 
            'net_pay', 
            'created_at'
        ]);
    }

    public function headings(): array
    {
        return [
            '#',
            'Fname',
            'Lname',
            'Phone',
            'Email',
            'Address',
            'Occupation',
            'Dob',
            'Gender',
            'Id Type',
            'NRC No',
            'Basic Pay',
            'Net Pay',
            'Created at',
        ];
    }

}