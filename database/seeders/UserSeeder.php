<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Infrastructure\User\Model\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'school_id' => 1,
                'username' => 'sudo',
                'email' => 'admin@mail.com',
                'status' => 1,
                'password' => bcrypt('admin'),
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],
            [
                'school_id' => 1,
                'username' => 'sudo2',
                'email' => 'admin2@mail.com',
                'status' => 1,
                'password' => bcrypt('admin'),
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]
        ]);
    }
}
