<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'officer']);
        
        // Dashboard Page
        Permission::create(['name' => 'view dashboard', 'description' => 'See the dashboard'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'view financial overview', 'description' => 'view financial overview'])->syncRoles([$role1]);
        Permission::create(['name' => 'help-desk and support', 'description' => 'Help-desk and support'])->syncRoles([$role1]);
        Permission::create(['name' => 'view kyc', 'description' => 'view financial overview'])->syncRoles([$role1, $role2]);
        
        // User Page
        Permission::create(['name' => 'see the list of users', 'description'=> 'Sees all the list of users registered in the system'])->syncRoles([$role1]);
        Permission::create(['name' => 'create a user', 'description'=> 'Creates a new user'])->syncRoles([$role1]);
        Permission::create(['name' => 'edit a user', 'description'=> 'Updates a user'])->syncRoles([$role1, $P]);
        // Roles Page
        Permission::create(['name' => 'view user roles', 'description' => 'View user roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'add user roles', 'description' => 'Add new roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'edit user roles', 'description' => 'Edit user roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'delete user roles', 'description' => 'Deletes user roles'])->syncRoles([$role1]);

        // Setting Page
        Permission::create(['name' => 'view system settings', 'description' => 'View system settings'])->syncRoles([$role1]);
        Permission::create(['name' => 'change system settings', 'description' => 'Change or update system settings'])->syncRoles([$role1]);

        // Loans Page
        Permission::create(['name' => 'view loans', 'description' => 'View loan management'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'view loan rates', 'description' => 'View loan management'])->syncRoles([$role1]);
        Permission::create(['name' => 'view loan calculator', 'description' => 'View loan management'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'view loan history', 'description' => 'View loan management'])->syncRoles([$role1]);
        Permission::create(['name' => 'view loan requests', 'description' => 'View loan requests'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'make payments', 'description' => 'Make payments to repay loans'])->syncRoles([$role2]);
        Permission::create(['name' => 'withdraw funds', 'description' => 'Withdraw loan funds'])->syncRoles([$role2]);
        Permission::create(['name' => 'accept and reject loan requests', 'description' => 'Accept and reject loan requests'])->syncRoles([$role2]);
        
        // Payments
        Permission::create(['name' => 'transfer funds to customers', 'description' => 'Transfer funds to customers'])->syncRoles([$role1]);
        Permission::create(['name' => 'payment remainders to customers', 'description' => 'Payment remainders to customers'])->syncRoles([$role1]);

        


        // Permission::create(['name' => 'admin.categories.index', 'description' => 'See the list of categories'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.categories.create', 'description' => 'Create a new category'])->syncRoles([$role1]);
        // Permission::create(['name' => 'admin.categories.edit', 'description' => 'Edit categories'])->syncRoles([$role1]);
        // Permission::create(['name' => 'admin.categories.destroy', 'description' => 'Delete categories'])->syncRoles([$role1]);

        // Permission::create(['name' => 'admin.tags.index', 'description' => 'See the list of tags'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.tags.create', 'description' => 'Create a new tag'])->syncRoles([$role1]);
        // Permission::create(['name' => 'admin.tags.edit', 'description' => 'Edit tags'])->syncRoles([$role1]);
        // Permission::create(['name' => 'admin.tags.destroy', 'description' => 'Delete tags'])->syncRoles([$role1]);

        // Permission::create(['name' => 'admin.posts.index', 'description' => 'See the list of posts'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.posts.create', 'description' => 'Create a new post'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.posts.edit', 'description' => 'Edit posts'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.posts.destroy', 'description' => 'Delete posts'])->syncRoles([$role1, $role2]);


    }
}
