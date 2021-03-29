<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('student_types')->insert([
            [
                'school_id' => 1,
                'type' => 'Normal',
                'note' => 'Estudiante normal',
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'school_id' => 1,
                'type' => 'Becado',
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
