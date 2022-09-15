<?php

use App\AcademicYear\Controller\AcademicYearController;
use App\Agreement\Controller\AgreementController;
use App\Career\Controller\CareerController;
use App\Cycle\Controller\CycleController;
use App\Email\Controller\EmailSettingController;
use App\Group\Controller\GroupController;
use App\Http\Controllers\RoleController;
use App\Language\Controller\LanguageController;
use App\Modality\Controller\ModalityController;
use App\School\Controller\SchoolController;
use App\Staterkit\Controller\StaterkitController;
use App\Student\Controller\StudentController;
use App\Subject\Controller\SubjectController;
use App\Syllabus\Controller\SyllabusController;
use App\Teacher\Controller\TeacherController;
use App\Upload\Controller\UploadController;
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

    // Academic year config, route admin/academic-year
    Route::resource('academic-years', AcademicYearController::class)->except([
        'show'
    ]);
    Route::get('/academic-years/getList', [AcademicYearController::class, 'getList']);

    Route::resource('modalities', ModalityController::class)->except([
        'show'
    ]);
    Route::get('/modalities/getList', [ModalityController::class, 'getList']);

    Route::resource('teachers', TeacherController::class)->except([
       'show'
    ]);
    Route::get('/teachers/getList', [TeacherController::class, 'getList']);

    // Students management
    Route::group(['prefix' => 'manage-students'], function() {
        Route::resource('students', StudentController::class)->except(['show']);
        Route::get('students/getList', [StudentController::class, 'getList']);
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

    // Groups management, route admin/manage-groups
    Route::resource('manage-groups', GroupController::class)->except(['show']);
    Route::get('/manage-groups/getList', [GroupController::class, 'getList']);

    // Syllabi management, route admin/manage-syllabi
    Route::get('/manage-syllabi/getList', [SyllabusController::class, 'getList']);
    Route::resource('manage-syllabi', SyllabusController::class)->except(['show']);

    Route::get('/manage-syllabi/{id}/cycles/getList', [CycleController::class, 'getList'])->name('manage-syllabi.cycles.getList');
    Route::resource('manage-syllabi.cycles', CycleController::class)->except(['show'])->shallow();

    // Subject management, route admin/manage-subjects
    Route::resource('manage-subjects', SubjectController::class)->except(['show']);
    Route::get('/manage-subjects/getList', [SubjectController::class, 'getList']);

    // Roles management, route admin/roles
    Route::resource('roles', RoleController::class);

    // Uploads testing
    Route::resource('upload', UploadController::class);
//    Route::post('/upload', [UploadController::class, 'store']);
//    Route::delete('/upload', [UploadController::class, 'destroy']);
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
