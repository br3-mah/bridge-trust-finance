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
            'Fname',
            'Lname',
            'Phone',
            'Email',
            'Address',
            'Occupation',
            'NRC No',
            'Gender',
            'Basic Pay',
            'Net Pay',
            'Created at',
            'Updated at'
        ];
    }

}