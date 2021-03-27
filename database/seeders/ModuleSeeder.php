<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();   //Get current date
        
        DB::table('modules')->insert([
            [
                'module_name'=>'Setting',
                'module_slug'=>'setting',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Theme',
                'module_slug'=>'theme',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Administrator',
                'module_slug'=>'administrator',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Human Resource',
                'module_slug'=>'hrm',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Teacher',
                'module_slug'=>'teacher',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Academic Activity',
                'module_slug'=>'academic',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Guardian',
                'module_slug'=>'guardian',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Student',
                'module_slug'=>'student',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Attendance',
                'module_slug'=>'attendance',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Assignment',
                'module_slug'=>'assignment',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Exam',
                'module_slug'=>'exam',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Library',
                'module_slug'=>'library',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Message, Email & SMS',
                'module_slug'=>'message',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Announcement',
                'module_slug'=>'announcement',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Event',
                'module_slug'=>'event',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Front Office',
                'module_slug'=>'frontoffice',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Accounting',
                'module_slug'=>'accounting',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Report',
                'module_slug'=>'report',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Exam Mark',
                'module_slug'=>'exam',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Certificate',
                'module_slug'=>'certificate',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Media Gallery',
                'module_slug'=>'gallery',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Frontend',
                'module_slug'=>'frontend',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Payroll',
                'module_slug'=>'payroll',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'Complain',
                'module_slug'=>'complain',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'User Complain',
                'module_slug'=>'usercomplain',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'User Leave',
                'module_slug'=>'userleave',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'module_name'=>'ID Card & Admit Card',
                'module_slug'=>'card',
                'status'=>1,
                'created_by'=>1,
                'modified_by'=>0,
                'created_at' => $date,
                'updated_at' => $date
            ],
        ]);
    }
}
