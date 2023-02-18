<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class GuarantorsView extends Component
{
    public $user_role, $permissions, $assigned_role;
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
        // $users = User::latest()->paginate(7);

        $guarantors = Application::where('status', 1)->where('complete', 1)->get();
        return view('livewire.dashboard.loans.guarantors-view',[
            'guarantors' => $guarantors,
            'roles' => $roles
        ])->layout('layouts.dashboard');
    }
}
