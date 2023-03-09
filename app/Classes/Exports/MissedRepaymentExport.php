<?php

namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use App\Models\Loan;
use App\Models\LoanInstallment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MissedRepaymentExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Get approved loans
        return Application::with(['loan.installment' => function ($query) {
            $query->where('next_dates', '<', now())
                ->whereNull('paid_at');
        }]) ->where('status', 1)->where('complete', 1)->get();
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