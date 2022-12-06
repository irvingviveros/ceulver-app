<?php

use App\AcademicYear\Controller\AcademicYearController;
use App\Accounting\Controller\AccountingDashboard;
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
use App\StudentReceipt\Controller\StudentReceiptController;
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
        Route::get('students/bulk-upload', [StudentController::class, 'createBulkImport'])->name('manage-students.bulk-upload.create');
        Route::post('students/bulk-upload', [StudentController::class, 'storeBulkImport'])->name('manage-students.bulk-upload.store');
        Route::get('students/getList', [StudentController::class, 'getList']);
        Route::resource('students', StudentController::class);
        // Student agreement types, route admin/manage-students/agreement
        Route::get('agreements/getList', [AgreementController::class, 'getList']);
        Route::resource('agreements', AgreementController::class)->except(['show']);
    });
//
//    Route::get('manage-students/agreement/', [AgreementController::class, 'index']);
//    Route::get('manage-students/agreement/{agreement}/edit', [AgreementController::class, 'edit']);

    // Financial management
    Route::group(['prefix' => 'accounting'], function() {
        Route::get('dashboard', AccountingDashboard::class)->name('accounting.dashboard');
        Route::get('student-receipts/{educational_system}', [StudentReceiptController::class, 'receiptsByEducationalSystem'])->name('student-receipts-educational-system.show');
        Route::resource('student-receipts', StudentReceiptController::class);
    });


    // Careers management, route admin/manage-careers
    Route::get('/manage-careers/getList', [CareerController::class, 'getList']);
    Route::resource('manage-careers', CareerController::class)->except(['show']);

    // Groups management, route admin/manage-groups
    Route::get('/manage-groups/getList', [GroupController::class, 'getList']);
    Route::resource('manage-groups', GroupController::class)->except(['show']);

    // Syllabi management, route admin/manage-syllabi
    Route::get('/manage-syllabi/getList', [SyllabusController::class, 'getList']);
    Route::resource('manage-syllabi', SyllabusController::class)->except(['show']);

    Route::get('/manage-syllabi/{id}/cycles/getList', [CycleController::class, 'getList'])->name('manage-syllabi.cycles.getList');
    Route::resource('manage-syllabi.cycles', CycleController::class)->except(['show'])->shallow();

    // Subject management, route admin/manage-subjects
    Route::get('/manage-subjects/getList', [SubjectController::class, 'getList']);
    Route::resource('manage-subjects', SubjectController::class)->except(['show']);

    // Roles management, route admin/roles
    Route::resource('roles', RoleController::class);

    // Uploads testing
    Route::resource('upload', UploadController::class);
//    Route::post('/upload', [UploadController::class, 'store']);
//    Route::delete('/upload', [UploadController::class, 'destroy']);
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
