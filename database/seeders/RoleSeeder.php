<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $role2 = Role::create(['name' => 'student']);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'manage-schools.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-schools.store'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-schools.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-schools.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-schools.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'manage-careers.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-careers.store'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-careers.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-careers.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-careers.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'manage-email-settings.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-email-settings.store'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-email-settings.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-email-settings.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'manage-email-settings.destroy'])->syncRoles([$role1, $role2]);
    }
}
