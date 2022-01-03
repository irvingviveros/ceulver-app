<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('modalities')->insert([
            [
                'name' => 'ESCOLARIZADA',
                'note' => null,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date,
                'school_id' => 1
            ],
            [
                'name' => 'MIXTO',
                'note' => null,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date,
                'school_id' => 1
            ]
        ]);
    }
}