<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');   //Get current date

        DB::table('schools')->insert([
            'school_name' => 'Testing Only',
            'address' => 'Testing Only',
            'email' => 'testing@email.com',
            'created_by' => 0,
            'modified_by' => 1,
            'created_at' => $date,
            'updated_at' => $date
    ]);
    }
}
