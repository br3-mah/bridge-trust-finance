<?php

namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoanExport implements FromCollection, WithHeadings
{
    public $status;
    public function __construct(int $status)
    {
        $this->status = $status;
    }
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

    public function query()
    {
        return Application::query()->where('status', $this->status);
    }

}