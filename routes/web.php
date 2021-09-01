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
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    // Schools management, route admin/manage-schools
    Route::group(['prefix' => 'manage-schools', 'as' => 'manage-schools.'], function() {
        Route::get('/', [SchoolController::class, 'index'])->name('index');
        Route::post('/', [SchoolController::class, 'store'])->name('store');
        Route::get('{id}/edit', [SchoolController::class, 'edit'])->name('edit');
        Route::post('{id}/edit', [SchoolController::class, 'update'])->name('update');
        Route::delete('{id}', [SchoolController::class, 'destroy'])->name('destroy');
    });

    // Email config, route admin/email-settings
    Route::group(['prefix' => 'email-settings', 'as' => 'email-settings.'], function() {
        Route::get('/', [EmailSettingController::class, 'index'])->name('index');
        Route::post('/', [EmailSettingController::class, 'store'])->name('store');
        Route::get('{id}/edit', [EmailSettingController::class, 'edit'])->name('edit');
        Route::post('{id}/edit', [EmailSettingController::class, 'update'])->name('update');
        Route::delete('{id}', [SchoolController::class, 'destroy'])->name('destroy');
    });

    // Students type, route admin/manage-students
    Route::group(['prefix' => 'manage-students', 'as' => 'manage-students.'], function() {
        // Students type, route admin/manage-students/type
        Route::group(['prefix' => 'type', 'as' => 'type.'], function() {
            Route::get('/', [StudentTypeController::class, 'index'])->name('index');
            Route::get('create', [StudentTypeController::class, 'create'])->name('create');
            Route::post('create', [StudentTypeController::class, 'store'])->name('store');
            Route::get('{id}/edit', [StudentTypeController::class, 'edit'])->name('edit');
            Route::post('{id}/edit', [StudentTypeController::class, 'update'])->name('update');
            Route::delete('{id}', [StudentTypeController::class, 'destroy'])->name('destroy');
        });
    });

    // Careers management, route admin/manage-careers
    Route::group(['prefix' => 'manage-careers', 'as' => 'manage-careers.'], function () {
        Route::get('/', [CareerController::class, 'index'])->name('index');
        Route::post('/', [CareerController::class, 'store'])->name('store');
        Route::get('admin/manage-careers/{id}/edit', [CareerController::class, 'edit'])->name('edit');
        Route::post('admin/manage-careers/{id}/edit', [CareerController::class, 'update'])->name('update');
    });
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
