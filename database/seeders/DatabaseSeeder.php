<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            ModuleSeeder::class,
            SchoolSeeder::class,
            UserSeeder::class,
            SystemAdminSeeder::class,
            CareerSeeder::class,
            StudentType::class,
        ]);
    }
}
