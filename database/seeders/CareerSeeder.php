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
        DB::table('careers')->insert([
            [
                'name' => 'INGENIERIA MECÁNICA AUTOMOTRIZ',
                'enrollment' => 'IMA',
                'opening_date' => '2014-09-01',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'LICENCIATURA EN DERECHO',
                'enrollment' => 'DER',
                'opening_date' => '2016-04-30',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'COMERCIO EXTERIOR Y ADUANAS',
                'enrollment' => 'CEYA',
                'opening_date' => '2016-12-14',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'INGENIERA PETROLERA',
                'enrollment' => 'IP',
                'opening_date' => '2016-12-14',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'GASTRONOMÍA',
                'enrollment' => 'GAS',
                'opening_date' => '2016-12-14',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'CRIMINOLOGÍA Y CRIMINALÍSTICA',
                'enrollment' => 'CYC',
                'opening_date' => '2012-09-02',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'EDUCACIÓN DEPORTIVA',
                'enrollment' => 'EDP',
                'opening_date' => '2012-09-02',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'DERECHO PROCESAL PENAL',
                'enrollment' => 'DPP',
                'opening_date' => '2013-11-30',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'GESTIÓN Y ADMINISTRACIÓN EDUCATIVA',
                'enrollment' => 'GAE',
                'opening_date' => '2013-11-11',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'CIENCIAS POLÍTICAS Y ADMINISTRACIÓN PÚBLICA',
                'enrollment' => 'CPAP',
                'opening_date' => '2012-11-11',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'PEDAGOGÍA',
                'enrollment' => 'PED',
                'opening_date' => '2017-09-14',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'MAESTRÍA EN CIENCIAS APLICADAS AL DEPORTE',
                'enrollment' => 'MCAD',
                'opening_date' => '2017-11-01',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'ADMINISTRACIÓN EMPRESARIAL',
                'enrollment' => 'AE',
                'opening_date' => '2018-01-01',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'INGENIERÍA MECATRÓNICA',
                'enrollment' => 'MEC',
                'opening_date' => '2018-09-10',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'INGENIERÍA INDUSTRIAL',
                'enrollment' => 'IND',
                'opening_date' => '2018-09-10',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'CONTADURÍA FISCAL',
                'enrollment' => 'CF',
                'opening_date' => '2018-11-13',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'INGENIERÍA EN SISTEMAS COMPUTACIONALES',
                'enrollment' => 'ISC',
                'opening_date' => '2018-11-13',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
            [
                'name' => 'LICENCIATURA EN PSICOLOGÍA',
                'enrollment' => 'PSI',
                'opening_date' => '2022-09-03',
                'status' => 1,
                'created_by' => 1,
                'modified_by' => 1,
                'created_at' => date_create(),
            ],
        ]);
    }
}
