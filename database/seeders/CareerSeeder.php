<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date

        DB::table('careers')->insert([
            [
                'name' => 'INGENIERIA MECÁNICA AUTOMOTRIZ',
                'enrollment' => 'IMA',
                'opening_date' => '2014-09-01',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'LICENCIATURA EN DERECHO',
                'enrollment' => 'DER',
                'opening_date' => '2016-04-30',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'COMERCIO EXTERIOR Y ADUANAS',
                'enrollment' => 'CEYA',
                'opening_date' => '2016-12-14',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'INGENIERA PETROLERA',
                'enrollment' => 'IP',
                'opening_date' => '2016-12-14',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'GASTRONOMÍA',
                'enrollment' => 'GAS',
                'opening_date' => '2016-12-14',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'CRIMINOLOGÍA Y CRIMINALÍSTICA',
                'enrollment' => 'CYC',
                'opening_date' => '2012-09-02',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'EDUCACIÓN DEPORTIVA',
                'enrollment' => 'EDP',
                'opening_date' => '2012-09-02',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'DERECHO PROCESAL PENAL',
                'enrollment' => 'DPP',
                'opening_date' => '2013-11-30',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'GESTIÓN Y ADMINISTRACIÓN EDUCATIVA',
                'enrollment' => 'GAE',
                'opening_date' => '2013-11-11',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'CIENCIAS POLÍTICAS Y ADMINISTRACIÓN PÚBLICA',
                'enrollment' => 'CPAP',
                'opening_date' => '2012-11-11',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'PEDAGOGÍA',
                'enrollment' => 'PED',
                'opening_date' => '2017-09-14',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'MAESTRÍA EN CIENCIAS APLICADAS AL DEPORTE',
                'enrollment' => 'MCAD',
                'opening_date' => '2017-11-01',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'ADMINISTRACIÓN EMPRESARIAL',
                'enrollment' => 'AE',
                'opening_date' => '2018-01-01',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'INGENIERÍA MECATRÓNICA',
                'enrollment' => 'MEC',
                'opening_date' => '2018-09-10',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'INGENIERÍA INDUSTRIAL',
                'enrollment' => 'IND',
                'opening_date' => '2018-09-10',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'CONTADURÍA FISCAL',
                'enrollment' => 'CF',
                'opening_date' => '2018-11-13',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'INGENIERÍA EN SISTEMAS COMPUTACIONALES',
                'enrollment' => 'ISC',
                'opening_date' => '2018-11-13',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ]);
    }
}
