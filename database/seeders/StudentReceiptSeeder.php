<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class StudentReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $totalStudents = 114;
        $totalReceipts = 1380;

        for ($counter = 0; $counter <= $totalReceipts; $counter++) {

            DB::table('student_receipts')->insert(
                [
                    'receipt_id' => $faker->unique(true)->numberBetween(1, $totalReceipts),
                    'student_id' => $faker->numberBetween(1, $totalStudents),
                    'created_by' => 1,
                    'created_at' => now(),
                    'modified_by' => null,
                ]
            );
        }
    }
}
