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
                'username' => 'spadmin',
                'email' => 'spadmin@mail.com',
                'status' => 1,
                'password' => bcrypt('admin'),
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],
            [
                'school_id' => 1,
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'status' => 1,
                'password' => bcrypt('admin'),
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],
            [
                'school_id' => 1,
                'username' => 'acc',
                'email' => 'accounting@mail.com',
                'status' => 1,
                'password' => bcrypt('admin'),
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],
        ]);
    }
}
