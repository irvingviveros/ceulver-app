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
            [
                'school_id' => 1,
                'username' => 'sudo',
                'email' => 'super-admin@mail.com',
                'status' => 1,
                'password' => bcrypt('super-admin'),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'school_id' => 1,
                'username' => 'sudo2',
                'email' => 'super-admin2@mail.com',
                'status' => 1,
                'password' => bcrypt('super-admin2'),
                'created_at' => $date,
                'updated_at' => $date
            ]
        ]);
    }
}
