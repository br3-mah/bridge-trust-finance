<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;

class PastMaturityDateView extends Component
{
    use EmailTrait, WalletTrait;
    public $loan_requests, $loan_request;
    public $type = [];
    public $status = [];
    public function render()
    {
        $loan_requests = Application::query();
        if ($this->type) {
            $loan_requests->whereIn('type', $this->type)
            ->where('status', 1)->where('complete', 1)
            ->where('due_date', '<', now());
        }

        if ($this->status){
            $loan_requests->whereIn('status', $this->status)
            ->where('status', 1)->where('complete', 1)
            ->where('due_date', '<', now());
        }

        $this->loan_requests = $loan_requests->where('status', 1)
        ->where('complete', 1)
        ->where('due_date', '<', now())->get();
        
     
        return view('livewire.dashboard.loans.past-maturity-date-view')
        ->layout('layouts.dashboard');
    }
}
