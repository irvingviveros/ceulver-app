<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Permission\Accounting\AccountingPermissions;
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

        // Create roles
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAccounting = Role::create(['name' => 'accounting']);

        // Accounting permission names, get values.
        $accountingPermissions = array_values(AccountingPermissions::allPermissions());

        // Assign to 'accounting' role his permissions
        foreach ($accountingPermissions as $permission)
            Permission::create(['name' => $permission]);
        // Assign 'accounting' permissions
        $roleAccounting->syncPermissions($accountingPermissions);

        // Assign 'home' permission
        Permission::create(['name' => 'home'])->syncRoles([$roleSuperAdmin, $roleAdmin, $roleAccounting]);
        // Permissions super admin
        Permission::create(['name' => 'see super-admin panel'])->syncRoles($roleSuperAdmin);
        // Permission to see company info (from User model)
        Permission::create(['name' => 'see company info'])->syncRoles($roleSuperAdmin, $roleAdmin, $roleAccounting);

        // Test
//        $roleAccounting->revokePermissionTo('student-receipts.educational-system.show');
    }
}
