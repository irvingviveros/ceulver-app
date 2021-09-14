<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('users')->insert([
            'school_id' => 1,
            'username' => 'sudo',
            'email' => 'irvingviveros@outlook.com',
            'status' => 1,
            'password' => bcrypt('sudo!'),
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
