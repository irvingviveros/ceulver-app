<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\User\Model\User;

class AssignRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find default users
        $superAdminUser = User::find(1);
        $adminUser = User::find(2);

        // Assign roles
        $superAdminUser->assignRole('super-admin');
        $adminUser->assignRole('admin');
    }
}
