<?php

namespace App\Classes\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BorrowerExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Email',
            'Created at',
            'Fname',
            'Lname',
            'Phone',
            'Address',
            'Occupation',
            'Dob',
            'Gender',
            'Basic Pay',
            'NRC No',
            'Net Pay',
            'Id Type'
        ];
    }

}