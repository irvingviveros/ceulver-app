<?php

namespace Database\Seeders;

use Domain\Syllabus\Service\SyllabusService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Infrastructure\Syllabus\Repository\EloquentSyllabusRepository;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();

        $syllabusService = new SyllabusService(new EloquentSyllabusRepository());
        $syllabi = $syllabusService->getAll();

        // Attach nine cycles for each syllabus.
        foreach ($syllabi as $syllabus) {
            for ($i = 1; $i <= 9; $i++)
            {
                DB::table('cycles')->insert([
                    [
                        'name' => 'Cuatrimestre '.$i,
                        'syllabus_id' => $syllabus->id,
                        'created_by' => 1,
                        'modified_by' => 1,
                        'created_at' => $date,
                        'updated_at' => $date
                    ]
                ]);
            }

        }

    }
}
