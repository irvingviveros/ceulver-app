<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('schools')->insert([
            [
                'name' => 'Centro Universitario Latino Veracruz',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ], [
                'name' => 'Centro Universitario Latino Veracruz',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 2,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ], [
                'name' => 'Centro Universitario Latino Veracruz',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 3,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ], [
                'name' => 'Centro Universitario Latino Veracruz',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 4,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ], [
                'name' => 'Centro Universitario Latino Veracruz',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 5,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ], [
                'name' => 'Centro Universitario Latino Veracruz',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 6,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],

        ]);
    }
}
