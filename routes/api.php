<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('students/receipts/{educationalSystem}', function ($educationalSystem) {

    $query = DB::table('receipts')
        ->join('student_receipts', 'receipts.id', '=', 'student_receipts.receipt_id')
        ->join('students', 'student_receipts.student_id', '=', 'students.id')
        ->join('schools', 'students.school_id', '=', 'schools.id')
        ->join('educational_systems', 'schools.educational_system_id', '=', 'educational_systems.id')
        ->select('receipts.*', 'students.id AS student_id', 'students.enrollment')
        ->where('educational_systems.name', '=', $educationalSystem);

    return datatables()
        ->query($query)
        ->toJson();
});

Route::get('school/{code}/students/', function ($code) {

    $query = DB::table('students')
        ->join('schools', 'students.school_id', '=', 'schools.id')
        ->join('educational_systems', 'schools.educational_system_id', '=', 'educational_systems.id')
        ->select('students.id', 'students.national_id', 'students.first_name', 'students.paternal_surname',
        'students.maternal_surname', 'students.enrollment', 'students.personal_email', 'students.personal_phone', 'students.user_id')
        ->where('schools.code', '=', $code);

    return datatables()
        ->query($query)
        ->toJson();
});
