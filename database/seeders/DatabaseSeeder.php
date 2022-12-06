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
            EducationalSystemSeeder::class,
            RoleSeeder::class,
            ModuleSeeder::class,
            SchoolSeeder::class,
            UserSeeder::class,
            SystemAdminSeeder::class,
            CareerSeeder::class,
            AgreementSeeder::class,
            ModalitySeeder::class,
//            StudentSeeder::class,
            GroupSeeder::class,
            SyllabusSeeder::class,
            CycleSeeder::class,
            ReceiptSeeder::class,
            StudentReceiptSeeder::class,
        ]);
    }
}
