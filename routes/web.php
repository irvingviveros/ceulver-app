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
        // Student convention types, route admin/manage-students/convention
        //Route::resource('convention', StudentConventionController::class)->except('show');
        // Student agreement types, route admin/manage-students/agreement
        Route::resource('agreement', AgreementController::class)->except(['show']);
    });

    // Careers management, route admin/manage-careers
    Route::resource('manage-careers', CareerController::class)->except(['show']);
    Route::get('/manage-careers/getList', [CareerController::class, 'getList']);

    Route::resource('roles', RoleController::class);
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
