<?php

namespace App\Http\Livewire\Dashboard\Employees;

use App\Classes\Exports\EmployeesExport;
use App\Models\Application;
use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Wallet;
use Maatwebsite\Excel\Facades\Excel;

class EmployeesView extends Component
{
    public $user_role, $permissions, $assigned_role;
    public $createModal = true;
    public $editModal = false;
    public $name, $fname, $lname, $phone, $address, $occupation, $nrc, $dob, $profile_photo_path, $gender, $loan_status, $basic_pay, $email;
    public $hold = '';
    public $style = '';
    public $userEdit;

    public function mount(){
        $this->userEdit = '';
    }

    public function render()
    {
        $this->user_role = Role::pluck('name')->toArray();
        $this->permissions = Permission::get();
        $roles = Role::orderBy('id','DESC')->paginate(5);
        
       
        try {
            if (Role::where('name', 'employee')->exists()) {
                $users = User::role('employee')->latest()->paginate(7);
            } else {
                $users = [];
            }
        } catch (\Throwable $th) {
            $users = [];
        }
        return view('livewire.dashboard.employees.employees-view', [
            'users' => $users,
            'roles' => $roles
        ])->layout('layouts.dashboard');
    }

    public function employeesExcelExport(){
        return Excel::download(new EmployeesExport, 'Employees.xlsx');
    }

    public function editUser($id){
        // $this->clear();
        $this->userEdit = User::where('id',$id)->first();
        // dd($this->userEdit);
    }

    public function clear(){
        $this->userEdit = '';
    }

    public function destory($id){
        $user = User::find($id); 
        if ($user) {
            try {
                $user->delete();
                Application::where('user_id','=',$id)->delete();
                Wallet::where('user_id','=',$id)->delete();
                Session::flash('deleted', "User Deleted.");
            } catch (\Throwable $th) {
                Session::flash('error_msg', "Oops, something went wrong account can not be deleted.");
            }
        } else {
            return redirect()->route('users');
        }
    }
}
