<?php

use App\Agreement\Controller\AgreementController;
use App\Career\Controller\CareerController;
use App\Email\Controller\EmailSettingController;
use App\Http\Controllers\RoleController;
use App\Language\Controller\LanguageController;
use App\School\Controller\SchoolController;
use App\Staterkit\Controller\StaterkitController;
use Illuminate\Support\Facades\Auth;
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
//Route::group(['prefix' => 'admin'], function() {
    // Schools management, route admin/manage-schools
    Route::resource('manage-schools', SchoolController::class)->except([
        'create', 'show'
    ]);

    // Email config, route admin/email-settings
    Route::resource('email-settings', EmailSettingController::class)->except([
        'create', 'show'
    ]);

    // Students management
    Route::group(['prefix' => 'manage-students'], function() {
        // Student agreement types, route admin/manage-students/agreement
        Route::resource('agreements', AgreementController::class)->except(['show']);
        Route::get('agreements/getList', [AgreementController::class, 'getList']);
    });
//
//    Route::get('manage-students/agreement/', [AgreementController::class, 'index']);
//    Route::get('manage-students/agreement/{agreement}/edit', [AgreementController::class, 'edit']);


    // Careers management, route admin/manage-careers
    Route::resource('manage-careers', CareerController::class)->except(['show']);
    Route::get('/manage-careers/getList', [CareerController::class, 'getList']);

    // Roles management, route admin/roles
    Route::resource('roles', RoleController::class);
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
