<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('groups')->insert([
            [
                'name' => 'Maternal',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '1° Jardín de niños',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 2,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '2° Jardín de niños',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 2,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '3° Jardín de niños',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 2,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '1° Primaria',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 3,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '2° Primaria',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 3,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '3° Primaria',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 3,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '4° Primaria',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 3,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '5° Primaria',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 3,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '6° Primaria',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 3,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '1° Secundaria',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 4,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '2° Secundaria',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 4,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '3° Secundaria',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 4,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '1° Bachillerato',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 5,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '2° Bachillerato',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 5,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '3° Bachillerato',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 5,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '4° Bachillerato',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 5,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '5° Bachillerato',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 5,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '6° Bachillerato',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 5,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '401 Escolarizado',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '402 Sabatino',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '601 Escolarizado',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '602 Sabatino',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '901 Escolarizado',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '902 Sabatino',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '301 Escolarizado',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '701 Escolarizado',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '702 Sabatino',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '101 Escolarizado',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => '102 Sabatino',
                'created_by' => 1,
                'modified_by' => 1,
                'school_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
        ]);
    }
}
