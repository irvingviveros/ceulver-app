<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Infrastructure\EducationalSystem\Model\EducationalSystem;
use Infrastructure\School\Model\School;

class EducationalSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        // Inserting specific records
        DB::table('educational_systems')->insert([
            [
                'name' => 'Maternal',
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Kinder',
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Primaria',
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Secundaria',
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Bachillerato',
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Universidad',
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
        ]);

        // Inserting records to CEULVER
        $ceulver = School::find(1);
        $educationalSystems = EducationalSystem::all()
            ->pluck('id');
        $ceulver->educationalSystems()->syncWithoutDetaching($educationalSystems);
//        foreach(School::all() as $school) {
//            $educationalSystems = EducationalSystem::all()
//                ->pluck('id');
//            $school->educationalSystems()->syncWithoutDetaching($educationalSystems);
//        }
    }
}
