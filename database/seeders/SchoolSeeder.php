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
                'code' => 'sc01',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 1,
                'company_id' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ], [
                'name' => 'Centro Universitario Latino Veracruz',
                'code' => 'sc02',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 2,
                'company_id' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ], [
                'name' => 'Centro Universitario Latino Veracruz',
                'code' => 'sc03',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 3,
                'company_id' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ], [
                'name' => 'Centro Universitario Latino Veracruz',
                'code' => 'sc04',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/logo_secundaria.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 4,
                'company_id' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ], [
                'name' => 'Centro Universitario Latino Veracruz',
                'code' => 'sc05',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 5,
                'company_id' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ], [
                'name' => 'Centro Universitario Latino Veracruz',
                'code' => 'sc06',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'tax_id' => 'CUL-090321-MJ2',
                'logo' => 'images/logo/ceulver_transparent.png',
                'phone' => '229-2835609 / 229-2004676',
                'educational_system_id' => 6,
                'company_id' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],

        ]);
    }
}
