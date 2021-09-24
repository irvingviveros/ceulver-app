<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('system_admins')->insert([
            [
                'is_default' => 1,
                'user_id' => 1,
                'name' => 'Super',
                'last_name' => 'Admin 1',
                'email' => 'super-admin@mail.com',
                'phone' => '5555444444',
                'address' => '',
                'gender' => 'Masculino',
                'birthday' => '1996-01-01',
                'photo' => '',
                'resume' => '',
                'other_info' => 'Super administrador global, desarrollador.',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'is_default' => 1,
                'user_id' => 2,
                'name' => 'Super',
                'last_name' => 'Admin 2',
                'email' => 'super-admin@mail.com',
                'phone' => '2222333333',
                'address' => '',
                'gender' => 'Masculino',
                'birthday' => '1996-01-01',
                'photo' => '',
                'resume' => '',
                'other_info' => 'Super administrador global, desarrollador.',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ]);
    }
}
