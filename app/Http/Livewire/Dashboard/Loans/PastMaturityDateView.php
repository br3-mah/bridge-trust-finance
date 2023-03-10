<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Classes\Exports\PMDExport;
use App\Models\Application;
use App\Models\Loans;
use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;
use Maatwebsite\Excel\Facades\Excel;

class PastMaturityDateView extends Component
{
    use EmailTrait, WalletTrait;
    public $loan_requests;
    public $type = [];

    public function render()
    {
        
        $this->loan_requests = Loans::with('application')->where('final_due_date', '<', now())
        ->orderBy('created_at', 'desc')->get();

        // // if ($this->type) {
        // //     $this->loan_requests = Loans::with(['application' => function($query){
        // //         $query->whereIn('type', $this->type);
        // //     }])
        // //     ->where('final_due_date', '<', now());
        // // }
        // // $this->loan_requests->with('application')->where('final_due_date', '<', now())
        // // ->orderBy('created_at', 'desc')->get();

        // dd($this->loan_requests);
        return view('livewire.dashboard.loans.past-maturity-date-view')
        ->layout('layouts.dashboard');
    }

    public function exportPMLoans(){
        return Excel::download(new PMDExport,  'Past Maturity Loans.xlsx');
    }
}
