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
            'school_name' => 'Centro Universitario Latino Veracruz',
            'address' => 'Av. Valentín Gómez Farías 522, Faros, 91700 Veracruz, Ver.',
            'email' => 'ceulver_excelenciaeducativa@live.com.mx',
            'created_by' => 0,
            'modified_by' => 1,
            'created_at' => $date,
            'updated_at' => $date
    ]);
    }
}
