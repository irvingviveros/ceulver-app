<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Infrastructure\Agreement\Model\Agreement;
use Infrastructure\School\Model\School;


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

        // Inserting specific records
        DB::table('agreements')->insert([
            [
                'name' => 'Pago día 30',
                'note' => 'Pago colegiatura estudiante día 30',
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Pago día 15',
                'note' => 'Pago colegiatura estudiante día 15',
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Pago día 7',
                'note' => 'Pago colegiatura estudiante día 7',
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ]);

        // Inserting random records
        //Agreement::factory()->times(10)->create();
        //School::factory()->count(5)->create();

        foreach(School::all() as $school) {
            $agreements = Agreement::inRandomOrder()
                ->take(rand(1,3))
                ->pluck('id');
            $school->agreements()->syncWithoutDetaching($agreements);
        }
    }
}
