<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('students')->insert([
            'school_id'         => 1,
            'user_id'           => 1, //TODO: Cambiar el user id cuando funcionen los permisos
            'payment_reference' => '2244242',
            'national_id'       => 'JAPJ970703HVZKLN07',
            'enrollment'        => 'IMA20220801',
            'first_name'        => 'Miguel',
            'paternal_surname'  => 'Pérez',
            'maternal_surname'  => 'Sánchez',
            'birth_date'        => Carbon::now()->subYears(16),
            'age'               => 16,
            'sex'               => 'Hombre',
            'address'           => 'Manuel Vazquez #38',
            'occupation'        => 'Estudiante',
            'personal_email'    => 'jake@gmail.com',
            'personal_phone'    => '2299533714',
            'allergies'         => 'Ninguna',
            'ailments'          => 'Ninguna',
            'blood_group'       => 'B+',
            'marital_status'    => 'Casado',
            'career_id'         => 5,
            'created_by'        => 1,
            'created_at'        => date_create()
        ]);
    }
}
