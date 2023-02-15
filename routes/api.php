<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

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

/**
 * This endpoint returns basic student data. It also contains
 * two essential columns for select2 dropdown: 'id' and 'text'
 * Example: api/school/xxx/student/search?name=xxx
 * @param $code
 * @return mixed
 * @throws ContainerExceptionInterface
 * @throws NotFoundExceptionInterface
 */
Route::get('school/{code}/students/search', function ($code) {

    $query = DB::table('students')
        ->leftJoin('careers', 'students.career_id', '=', 'careers.id')
        ->join('schools', 'students.school_id', '=', 'schools.id')
        ->select(
            'students.id AS id', 'students.national_id', 'students.first_name', 'students.paternal_surname',
            'students.maternal_surname', 'students.enrollment', 'students.personal_email', 'students.personal_phone', 'students.user_id',
            'students.payment_reference', 'careers.name AS career_name',
            (DB::raw("CONCAT(students.paternal_surname, ' ', students.maternal_surname, ' ', students.first_name) AS text")))
        ->where('schools.code', '=', $code)
        ->where(
            (DB::raw("CONCAT(students.paternal_surname, ' ', students.maternal_surname, ' ', students.first_name, '-', ' ', students.payment_reference)")), 'like', '%' . \request()->get('name') . '%');

    // Order results by full name (text)
    $query->orderBy('text');

    return DataTables::of($query)->toJson();
});

/**
 * This endpoint returns all student receipts from a specific school by the school code.
 * Example: api/schools/xxx/student-receipts
 * Used in students-receipts-datatable
 * @param $code
 * @return mixed
 * @throws ContainerExceptionInterface
 * @throws NotFoundExceptionInterface
 */
Route::get('schools/{code}/student-receipts/', function ($code) {

    $query = DB::table('receipts')
        ->join('student_receipts', 'receipts.id', '=', 'student_receipts.receipt_id')
        ->join('students', 'student_receipts.student_id', '=', 'students.id')
        ->join('schools', 'students.school_id', '=', 'schools.id')
        ->select(
            'receipts.id as base_receipt_id',
            'student_receipts.id as id',
            'receipts.sheet',
            'receipts.payment_method',
            'receipts.payment_concept',
            'receipts.amount',
            'receipts.amount_text',
            'receipts.payment_date',
            'receipts.note',
            'receipts.created_by',
            'receipts.modified_by',
            'receipts.created_at',
            'receipts.updated_at',
            'receipts.deleted_at',
            'students.id AS student_id',
            'students.enrollment',
            'students.payment_reference')
        ->where('schools.code', '=', $code);

    return DataTables::of($query)->toJson();
});


// Get receipts by company id and educational system name
Route::get('companies/{id}/{educationalSystem}/student-receipts/', function ($id, $educationalSystem) {

    $query = DB::table('receipts')
        ->join('student_receipts', 'receipts.id', '=', 'student_receipts.receipt_id')
        ->join('students', 'student_receipts.student_id', '=', 'students.id')
        ->join('schools', 'students.school_id', '=', 'schools.id')
        ->join('educational_systems', 'schools.educational_system_id', '=', 'educational_systems.id')
        ->join('companies', 'schools.company_id', '=', 'companies.id')
        ->select(
            'receipts.id as base_receipt_id',
            'student_receipts.id as id',
            'receipts.sheet',
            'receipts.payment_method',
            'receipts.payment_concept',
            'receipts.amount',
            'receipts.amount_text',
            'receipts.payment_date',
            'receipts.note',
            'receipts.created_by',
            'receipts.modified_by',
            'receipts.created_at',
            'receipts.updated_at',
            'receipts.deleted_at',
            'students.id AS student_id',
            'students.enrollment',
            'students.payment_reference',)
        ->where('companies.id', '=', $id)
        ->where('educational_systems.name', '=', $educationalSystem)->get();

    return DataTables::of($query)->toJson();
});
