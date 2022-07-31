<?php

use App\Models\EmailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Infrastructure\Agreement\Model\Agreement;
use Infrastructure\Career\Model\Career;
use Infrastructure\School\Model\School;
use Infrastructure\Student\Model\Student;
use Yajra\DataTables\DataTables;

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
