<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role1 = Role::create(['name' => 'super-admin']);
        $role2 = Role::create(['name' => 'admin']);
        $role3 = Role::create(['name' => 'student']);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'accounting-dashboard'])->syncRoles([$role1]);
        Permission::create(['name' => 'student-receipts-educational-system.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'student-receipts-educational-system.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'student-receipts-educational-system.show'])->syncRoles([$role1]);
    }
}
