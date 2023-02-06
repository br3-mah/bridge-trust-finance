<?php

namespace App\Http\Livewire\Dashboard\Settings;


use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolesView extends Component
{
    use WithPagination;
    public $user_roles, $permissions, $name, $role, $rolePermissions;
    public $permission = [];
    public $editModal;
    public $createModal = false;
    // public $checked = 'checked';

    public function render()
    {
        $this->editModal = '';
        $this->user_roles = Role::pluck('name')->toArray();
        $this->permissions = Permission::get();
        $roles = Role::orderBy('id','DESC')->paginate(5);
        
        return view('livewire.dashboard.settings.user-roles-view', [
            'roles' => $roles
        ])
        ->layout('layouts.dashboard');
    }

    public function store(){
        // $this->validate($request, [
        //     'name' => 'required|unique:roles,name',
        //     'permission' => 'required',
        // ]);
        try {
            $role = Role::create(['name' => $this->name]);
            $role->syncPermissions($this->permission);
        
            Session::flash('attention', "New role created successfully.");
            $this->clearFields();
            return redirect()->back();
        } catch (\Throwable $th) {
            Session::flash('error_msg', substr($th->getMessage(),16,110));
            return redirect()->route('users');
        }
    }

    public function show(Role $role)
    {
        $role = $role;
        $rolePermissions = $role->permissions;
    }

    public function edit(Role $role)
    {
        $this->role = $role;
        $this->rolePermissions = $role->permissions->pluck('name')->toArray();
        $this->editModal = 'show';
         
    }

    public function updatedEditModal(){
        $this->editModal = 'show';
    }

    public function update(Role $role)
    {
        try {
            // $this->validate($request, [
            //     'name' => 'required',
            //     'permission' => 'required',
            // ]);
            $role->update(['name' => $this->name]);
            $role->syncPermissions($this->permission);
            Session::flash('attention', "Role updated successfully.");
        } catch (\Throwable $th) {
            Session::flash('error_msg', substr($th->getMessage(),16,110));
            return redirect()->route('users');
        }
        // return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        Session::flash('attention', "Role deleted successfully.");
        // return redirect()->route('roles.index');
    }

    // ------------------ Toggles
    public function toggleCreateModal(){
        $this->createModal = !$this->createModal;
        $this->clearFields();
    }

    public function closeModal(){
        $this->editModal = '';
    }

    // ------------------ Clear
    public function clearEditModal(){
        $this->role = '';
        $this->rolePermissions = [];
    }

    public function clearFields(){
        $this->user_roles = []; 
        $this->permissions = []; 
        $this->name = '';
        $this->role = ''; 
        $this->rolePermissions = [];
    }
}
