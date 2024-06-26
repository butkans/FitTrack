<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $registeredUserRole = Role::create(['name' => 'registered_user']);

        // Create permissions
        $permissions = [
            'access_workouts',
            'filter_workouts',
            'create_workouts',
            'update_workouts',
            'delete_workouts',
            'view_profiles',
            'create_comments',
            'update_comments',
            'delete_comments',
            'block_users'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to roles
        $adminRole->givePermissionTo(Permission::all());
        $registeredUserRole->givePermissionTo([
            'access_workouts',
            'filter_workouts',
            'create_workouts',
            'update_workouts',
            'delete_workouts',
            'view_profiles',
            'create_comments',
            'update_comments',
            'delete_comments'
        ]);
    }
}