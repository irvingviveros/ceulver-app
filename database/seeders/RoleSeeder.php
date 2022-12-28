<?php
declare(strict_types=1);

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
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Accounting permission names
        $accountingPermissionNames = [
            'accounting-dashboard.index',
            'student-receipts.educational-system.index',
            'student-receipts.educational-system.create',
            'student-receipts.educational-system.show',
            'student-receipts.educational-system.edit',
            'student-receipts.educational-system.softDelete',
            'see accounting panel',
        ];

        // Create roles
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleStudent = Role::create(['name' => 'student']);
        $roleAccounting = Role::create(['name' => 'accounting']);

        // Assign to 'accounting' role his permissions
        foreach ($accountingPermissionNames as $accountingPermissionName)
            Permission::create(['name' => $accountingPermissionName]);

        // Assign 'home' permission
        Permission::create(['name' => 'home'])->syncRoles([$roleSuperAdmin, $roleAdmin, $roleAccounting]);

        // Permissions super admin
        Permission::create(['name' => 'see super-admin panel'])->syncRoles($roleSuperAdmin);

        // Assign 'accounting' permissions
        $roleAccounting->syncPermissions($accountingPermissionNames);

        // Test
//        $roleAccounting->revokePermissionTo('student-receipts.educational-system.show');
    }
}
