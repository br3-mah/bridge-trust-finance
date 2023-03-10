<?php

namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoanExport implements FromQuery
{
    public $status;

    public function __construct(array $status)
    {
        $this->status = $status;
    }

    // public function collection()
    // {
    //     return Application::query()->where('status', $this->status)->where('status', $this->status);
    // }

    // public function headings(): array
    // {
    //     return [
    //         '#',
    //         'Fname',
    //         'Lname',
    //         'Email',
    //         'Phone',
    //         'Gender',
    //         'Type',
    //         'Status',
    //         'Created at',
    //         'Amount',
    //         'Interest'
    //     ];
    // }

    public function query()
    {
        return Application::query()
        ->select('fname', 'lname', 'email', 'phone', 'gender', 'type', 'amount', 'interest', 'repayment_plan', 'status', 'created_at')
        ->where('status', $this->status);
    }

}