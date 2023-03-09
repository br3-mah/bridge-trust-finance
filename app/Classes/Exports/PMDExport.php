<?php

namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PMDExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Past Maturity Date Report
        return Application::with(['loan' => function ($query) {
            $query->where('final_due_date', '<', now());
        }])->with('user')->where('status', 1)->where('complete', 1)->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Fname',
            'Lname',
            'Email',
            'Phone',
            'Gender',
            'Type',
            'Status',
            'Created at',
            'Amount',
            'Interest'
        ];
    }

}