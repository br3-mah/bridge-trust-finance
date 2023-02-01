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
        Permission::create(['name' => 'admin.home', 'description' => 'See the dashboard'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'dashboard.all.finances', 'description' => 'View financial overview'])->syncRoles([$role1]);

        // User Page
        Permission::create(['name' => 'admin.users.index', 'description' => 'See the list of users'])->syncRoles([$role1]);
        // Roles Page
        Permission::create(['name' => 'view roles', 'description' => 'view roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'add new roles', 'description' => 'add new roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'edit role', 'description' => 'edit roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'delete roles', 'description' => 'delete roles'])->syncRoles([$role1]);

        // Setting Page
        Permission::create(['name' => 'view system settings', 'description' => 'view system settings'])->syncRoles([$role1]);
        Permission::create(['name' => 'change system settings', 'description' => 'change system settings'])->syncRoles([$role1]);

        // Loans Page
        Permission::create(['name' => 'view all loan requests', 'description' => 'view all loan requests'])->syncRoles([$role1]);
        Permission::create(['name' => 'make payments', 'description' => 'make payments'])->syncRoles([$role2]);
        Permission::create(['name' => 'withdraw funds', 'description' => 'withdraw funds'])->syncRoles([$role2]);

        // 


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
