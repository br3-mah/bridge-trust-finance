<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Traits\LoanTrait;

class MissedRepaymentsView extends Component
{
    use LoanTrait;
    public $user_role, $permissions, $assigned_role, $mssd_repays;
    public $createModal = true;
    public $editModal = false;
    public $name, $fname, $lname, $phone, $address, $occupation, $nrc, $dob, $profile_photo_path, $gender, $loan_status, $basic_pay, $email;
    public $hold = '';
    public $style = '';

    public function render()
    {
        $this->user_role = Role::pluck('name')->toArray();
        $this->permissions = Permission::get();
        $roles = Role::orderBy('id','DESC')->paginate(5);
        $users = User::latest()->paginate(7);
        $this->mssd_repays = $this->missed_repayments();

        return view('livewire.dashboard.loans.missed-repayments-view',[
            'users' => $users,
            'roles' => $roles
        ])->layout('layouts.dashboard');
    }
}
