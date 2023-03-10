<?php
namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use App\Models\Loan;
use App\Models\LoanInstallment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuarantorExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Application::where('status', 1)->where('complete', 1)->get([
            'glname',
            'gfname',
            'gemail',
            'gphone',
            'g_gender',
            'g_relation',
    
            'g2lname',
            'g2fname',
            'g2email',
            'g2phone',
            'g2_gender',
            'g2_relation'
        ]);
    }

    public function headings(): array
    {
        return [
            '#',
            'Glname',
            'Gfname',
            'Gemail',
            'Gphone',
            'G gender',
            'G relation',
            'G2lname',
            'G2fname',
            'G2email',
            'G2phone',
            'G2 gender',
            'G2 relation'
        ];
    }

}