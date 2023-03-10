<?php

namespace App\Classes\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return  Transaction::with(['application.user' => function($query){
            $query->select('fname', 'lname', 'type');
        }])->orderBy('created_at', 'desc')->get(['ref_no', 'created_at', 'proccess_by']);
    }

    public function headings(): array
    {
        return [
            '#',
            'Fname',
            'Lname',
            'Type',
            'Amount Paid',
            'Ref No',
            'Created at',
            'Processed by'
        ];
    }

}