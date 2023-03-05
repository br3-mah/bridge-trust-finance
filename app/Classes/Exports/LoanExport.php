<?php

namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Application::all();
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
            'Type',
            'Amount',
            'Repayment plan',
            'Gfname',
            'Glname',
            'Gemail',
            'G gender',
            'G relation',
            'Status',
            'Complete'
        ];
    }

}