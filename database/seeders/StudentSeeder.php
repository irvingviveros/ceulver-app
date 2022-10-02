<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Support\Enums\MaritalStatusEnum;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('students')->insert([
            'school_id' => 1,
            'user_id' => 1, //TODO: Cambiar el user id cuando funcionen los permisos
            'payment_reference' => '2244242',
            'national_id' => 'JAPJ970703HVZKLN07',
            'enrollment' => 'IMA20220801',
            'first_name' => 'Miguel',
            'paternal_surname' => 'Pérez',
            'maternal_surname' => 'Sánchez',
            'birth_date' => Carbon::now()->subYears(20),
            'age' => 20,
            'sex' => 'Hombre',
            'address' => 'Manuel Vazquez #38',
            'occupation' => 'Estudiante',
            'personal_email' => 'jake@gmail.com',
            'personal_phone' => '2299533714',
            'blood_group' => 'B+',
            'health_condition' => 'Ninguna',
            'marital_status' => 'Casado',
            'created_by' => 1,
            'created_at' => $date
        ]);
    }
}
