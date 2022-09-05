<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SyllabusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('syllabi')->insert([
            [
                'name' => 'COMERCIO EXTERIOR Y ADUANAS',
                'school_id' => 6,
                'career_id' => 3,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'INGENIERÍA MECÁNICA AUTOMOTRIZ',
                'school_id' => 6,
                'career_id' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'INGENIERÍA PETROLERA',
                'school_id' => 6,
                'career_id' => 4,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'GASTRONOMÍA',
                'school_id' => 6,
                'career_id' => 5,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'CIENCIAS POLÍTICAS',
                'school_id' => 6,
                'career_id' => 10,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'CRIMINOLOGÍA',
                'school_id' => 6,
                'career_id' => 6,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'EDUCACIÓN DEPORTIVA',
                'school_id' => 6,
                'career_id' => 7,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'DERECHO',
                'school_id' => 6,
                'career_id' => 2,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'MTRIA. GESTIÓN Y ADMINISTRACIÓN EDUCATIVA',
                'school_id' => 6,
                'career_id' => 2,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'MTRIA. DERECHO PROCESAL PENAL',
                'school_id' => 6,
                'career_id' => 8,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'PEDAGOGÍA',
                'school_id' => 6,
                'career_id' => 11,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'MTRIA. EN CIENCIAS APLICADAS AL DEPORTE',
                'school_id' => 6,
                'career_id' => 12,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'ADMINISTRACIÓN EMPRESARIAL',
                'school_id' => 6,
                'career_id' => 13,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'INGENIERÍA INDUSTRIAL',
                'school_id' => 6,
                'career_id' => 15,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'INGENIERÍA MECATRÓNICA',
                'school_id' => 6,
                'career_id' => 14,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'CONTADURÍA FISCAL',
                'school_id' => 6,
                'career_id' => 16,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
        ]);
    }
}
