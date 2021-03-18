<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');   //Get current date

        DB::table('roles')->insert([
            [
                'slug' => 'super-admin',
                'name' => 'Super Admin',
                'note' => 'Usuario Super Administrador',
                'is_default' => 1,
                'is_super_admin' => 1,
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'slug' => 'admin',
                'name' => 'Admin',
                'note' => 'Usuario Administrador',
                'is_default' => 1,
                'is_super_admin' => 0,
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'slug' => 'tutor',
                'name' => 'Tutor',
                'note' => 'Padre o Tutor',
                'is_default' => 1,
                'is_super_admin' => 0,
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'slug' => 'estudiante',
                'name' => 'Estudiante',
                'note' => 'Estudiante',
                'is_default' => 1,
                'is_super_admin' => 0,
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'slug' => 'profesor',
                'name' => 'Profesor',
                'note' => 'Profesor',
                'is_default' => 1,
                'is_super_admin' => 0,
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'slug' => 'financiero',
                'name' => 'Financiero',
                'note' => 'Departamento Financiero',
                'is_default' => 1,
                'is_super_admin' => 0,
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'slug' => 'bibliotecario',
                'name' => 'Bibliotecario',
                'note' => 'Bibliotecario',
                'is_default' => 1,
                'is_super_admin' => 0,
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'slug' => 'recepcionista',
                'name' => 'Recepcionista',
                'note' => 'Recepcionista / Usuario de receipción',
                'is_default' => 1,
                'is_super_admin' => 0,
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'slug' => 'staff',
                'name' => 'Staff',
                'note' => 'Usuario de personal staff',
                'is_default' => 0,
                'is_super_admin' => 0,
                'status' => 1,
                'created_by' => 0,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ]);
    }
}
