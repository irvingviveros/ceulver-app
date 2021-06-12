<?php

use App\Models\EmailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
        ->eloquent(\App\Models\School::query())
        ->toJson();
});

// Return Email Settings data
Route::get('email_settings', function(){
    $formattedData = EmailSetting::getDataTable();
    return DataTables::of($formattedData)->toJson();
});

// Return School data
Route::get('careers', function(){
    return datatables()
        ->eloquent(\App\Models\Career::query())
        ->toJson();
});