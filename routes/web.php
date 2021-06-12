<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\EmailSettingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\StudentTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();
Auth::routes();

Route::get('/', [StaterkitController::class, 'home'])->name('home') -> middleware('auth');
Route::get('home', [StaterkitController::class, 'home'])->name('home') -> middleware('auth');

// Route Components

// Admin
// Schools management
Route::get('admin/manage-schools', [SchoolController::class, 'index'])->name('manage-schools');
Route::post('admin/manage-schools', [SchoolController::class, 'store']);
Route::get('admin/manage-schools/{id}/edit', [SchoolController::class, 'edit']);
Route::post('admin/manage-schools/{id}/edit', [SchoolController::class, 'update']);
Route::delete('admin/manage-schools/{id}', [SchoolController::class, 'destroy']);

// Email config
Route::get('admin/email-settings', [EmailSettingController::class, 'index'])->name('email-settings');
Route::post('admin/mail-settings', [EmailSettingController::class, 'store']);
Route::get('admin/email-settings/{id}/edit', [EmailSettingController::class, 'edit']);
Route::post('admin/email-settings/{id}/edit', [EmailSettingController::class, 'update']);
Route::delete('admin/email-settings/{id}', [SchoolController::class, 'destroy']);

// Students type
Route::get('admin/manage-students/type', [StudentTypeController::class, 'index'])->name('student-type');
Route::get('admin/manage-students/type/create', [StudentTypeController::class, 'create'])->name('create-student-type');
Route::post('admin/manage-students/type/create', [StudentTypeController::class, 'store'])->name('store-student-type');
Route::get('admin/manage-students/type/{id}/edit', [StudentTypeController::class, 'edit']);
Route::post('admin/manage-students/type/{id}/edit', [StudentTypeController::class, 'update']);
Route::delete('admin/manage-students/type/{id}', [StudentTypeController::class, 'destroy']);

// Careers management
Route::get('admin/manage-careers', [CareerController::class, 'index'])->name('manage-careers');
Route::post('admin/manage-careers', [CareerController::class, 'store']);
Route::get('admin/manage-careers/{id}/edit', [CareerController::class, 'edit']);
Route::post('admin/manage-careers/{id}/edit', [CareerController::class, 'update']);

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
