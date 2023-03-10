<?php
namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use App\Models\Loan;
use App\Models\LoanInstallment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GuarantorExport implements FromView
{
    public function view(): View
    {
        return view('livewire.dashboard.loans.missed-repayments-view', [
            'guarantors' => Application::where('status', 1)->where('complete', 1)->get()
        ]);
    }

}