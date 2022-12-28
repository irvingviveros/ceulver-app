<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'Centro Universitario Latino Veracruz',
                'email' => 'ceulver_excelenciaeducativa@live.com.mx',
                'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
                'phone' => '2292835609',
                'created_by' => 1,
                'created_at' => date_create(),
                'updated_at' => date_create(),
            ],
        ]);
    }
}
