<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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

        User::create([
            'school_id' => 1,
            'username' => 'sudo',
            'email' => 'irvingviveros@outlook.com',
            'status' => 1,
            'password' => bcrypt('sudo!'),
            'created_at' => $date,
            'updated_at' => $date
        ])->assignRole('admin');
    }
}
