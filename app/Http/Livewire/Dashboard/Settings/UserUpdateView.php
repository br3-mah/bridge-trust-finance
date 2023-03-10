<?php

namespace App\Http\Livewire\Dashboard\Settings;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class UserUpdateView extends Component
{
    public $user;
    public $user_role, $roles, $permissions;
    public function mount($id)
    {
        $this->user_role = Role::pluck('name')->toArray();
        $this->permissions = Permission::get();
        $this->roles = Role::all();
        $this->user = User::find($id);

    }
    public function render()
    {
        return view('livewire.dashboard.settings.user-update-view')
        ->layout('layouts.dashboard');
    }
}
