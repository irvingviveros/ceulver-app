<?php

use App\Models\EmailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Infrastructure\Agreement\Model\Agreement;
use Infrastructure\Career\Model\Career;
use Infrastructure\Cycle\Model\Cycle;
use Infrastructure\Group\Model\Group;
use Infrastructure\School\Model\School;
use Infrastructure\Student\Model\Student;
use Infrastructure\Syllabus\Model\Syllabus;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Builder;

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

// Return School data
Route::get('schools', function(){
    return datatables()
        ->eloquent(School::query())
        ->toJson();
});

// Return Email Settings data
Route::get('email_settings', function(){
    $formattedData = EmailSetting::getDataTable();
    return DataTables::of($formattedData)->toJson();
});

// Return Careers data
Route::get('careers', function(){
    return datatables()
        ->eloquent(Career::query())
        ->toJson();
});

// Return School data
Route::get('agreements', function(){
    return datatables()
        ->eloquent(Agreement::query())
        ->toJson();
});

// Return Students data
Route::get('students', function(){
    return datatables()
        ->eloquent(Student::query())
        ->toJson();
});

// Return Groups data
Route::get('groups', function(){
    return datatables()
        ->eloquent(Group::query())
        ->toJson();
});

// Return Syllabi data
Route::get('syllabi', function(){
    return datatables()
        ->eloquent(Syllabus::query())
        ->toJson();
});

// Return Syllabi data
Route::get('cycle', function(){
    return datatables()
        ->eloquent(Cycle::query())
        ->toJson();
});

Route::get('students/receipts', function(){

    $query = DB::table('receipts')
        ->join('student_receipts', 'receipts.id', '=', 'student_receipts.receipt_id')
        ->join('students', 'student_receipts.student_id', '=', 'students.id')
        ->join('schools', 'students.school_id', '=', 'schools.id')
        ->join('educational_systems', 'schools.educational_system_id', '=', 'educational_systems.id')
        ->select('receipts.*', 'students.enrollment', 'students.id AS student_id')
        ->where('educational_systems.name', '=', 'Universidad');

    return datatables()
        ->query($query)
        ->toJson();
});
