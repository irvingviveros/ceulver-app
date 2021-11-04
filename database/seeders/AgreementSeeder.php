<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgreementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('agreements')->insert([
            [
                'school_id' => 1,
                'agreement' => 'Normal',
                'note' => 'Estudiante normal',
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'school_id' => 1,
                'agreement' => 'Becado',
                'note' => 'Estudiante becado',
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
        ]);
    }
}
