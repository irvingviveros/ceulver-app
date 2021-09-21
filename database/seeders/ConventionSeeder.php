<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('conventions')->insert([
            [
                'school_id' => 1,
                'convention' => 'Normal',
                'note' => 'Estudiante normal',
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'school_id' => 1,
                'convention' => 'Becado',
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
