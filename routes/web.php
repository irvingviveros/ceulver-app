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
use App\OtherReceipt\Controller\OtherReceiptController;
use App\School\Controller\SchoolController;
use App\Staterkit\Controller\StaterkitController;
use App\Student\Controller\StudentController;
use App\StudentReceipt\Controller\StudentReceiptController;
use App\Subject\Controller\SubjectController;
use App\Syllabus\Controller\SyllabusController;
use App\Teacher\Controller\TeacherController;
use App\UniqueExamReceipt\Controller\UniqueExamReceiptController;
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
    Route::resource('manage-schools', SchoolController::class)
        ->except(['create', 'show'])
        ->middleware('role:super-admin');

    // Email config, route admin/email-settings
    Route::resource('email-settings', EmailSettingController::class)
        ->except(['create', 'show'])
        ->middleware('role:super-admin');

    // Academic year config, route admin/academic-year
    Route::resource('academic-years', AcademicYearController::class)
        ->except(['show'])
        ->middleware('role:super-admin');

    Route::get('/academic-years/getList', [AcademicYearController::class, 'getList'])
        ->middleware('role:super-admin');

    Route::resource('modalities', ModalityController::class)->except(['show'])
        ->middleware('role:super-admin');

    Route::get('/modalities/getList', [ModalityController::class, 'getList']);

    Route::resource('teachers', TeacherController::class)->except(['show'])
        ->middleware('role:super-admin');

    Route::get('/teachers/getList', [TeacherController::class, 'getList'])
        ->middleware('role:super-admin');

    // Students management
    Route::group(['prefix' => 'manage-students'], function() {
        Route::get('students/bulk-upload', [StudentController::class, 'createBulkImport'])->name('manage-students.bulk-upload.create');
        Route::post('students/bulk-upload', [StudentController::class, 'storeBulkImport'])->name('manage-students.bulk-upload.store');
        Route::get('students/getList', [StudentController::class, 'getList']);
        Route::get('students/getPrintedRegistrationForm/{id}', [StudentController::class, 'getPrintedRegistrationForm']);
        Route::resource('students', StudentController::class);
        // Student agreement types, route admin/manage-students/agreement
        Route::get('agreements/getList', [AgreementController::class, 'getList']);
        Route::resource('agreements', AgreementController::class)->except(['show']);
    });
//
//    Route::get('manage-students/agreement/', [AgreementController::class, 'index']);
//    Route::get('manage-students/agreement/{agreement}/edit', [AgreementController::class, 'edit']);

    // Financial management
    Route::group(['prefix' => 'accounting', 'middleware' => ['can:see accounting panel']], function() {

        Route::get('dashboard', AccountingDashboard::class)
            ->name('accounting.dashboard')
            ->middleware('can:accounting-dashboard.index');

        Route::get('/', function () {
            return redirect()->route('accounting.dashboard');
        })->middleware('can:accounting-dashboard.index');

        // ============= Bulk upload =====================

        Route::get('student-receipts/bulk-upload', [StudentReceiptController::class, 'createBulkImport'])
            ->name('student-receipts.bulk-upload')
            ->middleware('role:super-admin');
        Route::post('student-receipts/bulk-upload', [StudentReceiptController::class, 'storeBulkImport'])
            ->name('student-receipts.bulk-upload.store')
            ->middleware('role:super-admin');

        // ============= University receipts =============

        // Index university receipt
        Route::get('student-receipts/university', [StudentReceiptController::class, 'index'])
            ->name('student-receipts.university.index')
            ->middleware('can:student-receipts.university.index');
        // Create university receipt
        Route::get('student-receipts/{university}/create', [StudentReceiptController::class, 'createWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.university.create');
        // Show university receipt
        Route::get('student-receipts/{university}/{id}', [StudentReceiptController::class, 'showByEducationalSystem'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.university.show');
        // Edit university receipt
        Route::get('student-receipts/{university}/{id}/edit', [StudentReceiptController::class, 'editReceipt'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.university.edit');
        // Update university receipt
        Route::put('student-receipts/{university}/{id}', [StudentReceiptController::class, 'updateReceipt'])
            ->name('student-receipts-educational-system.update')
            ->middleware('can:student-receipts.university.edit');
        // Store university receipt
        Route::post('student-receipts/{university}', [StudentReceiptController::class, 'storeWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.university.create');
        // Soft delete university receipt
        Route::delete('student-receipts/{university}/{id}', [StudentReceiptController::class, 'softDelete'])
            ->name('student-receipts-action-delete')
            ->middleware('can:student-receipts.university.cancel');

        // ============= Bachelor receipts =============

        // Index bachelor receipt
        Route::get('student-receipts/bachelor', [StudentReceiptController::class, 'index'])
            ->name('student-receipts.bachelor.index')
            ->middleware('can:student-receipts.bachelor.index');
        // Create bachelor receipt
        Route::get('student-receipts/{bachelor}/create', [StudentReceiptController::class, 'createWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.bachelor.create');
        // Show bachelor receipt
        Route::get('student-receipts/{bachelor}/{id}', [StudentReceiptController::class, 'showByEducationalSystem'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.bachelor.show');
        // Edit bachelor receipt
        Route::get('student-receipts/{bachelor}/{id}/edit', [StudentReceiptController::class, 'editReceipt'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.bachelor.edit');
        // Update bachelor receipt
        Route::put('student-receipts/{bachelor}/{id}', [StudentReceiptController::class, 'updateReceipt'])
            ->name('student-receipts-educational-system.update')
            ->middleware('can:student-receipts.bachelor.edit');
        // Store bachelor receipt
        Route::post('student-receipts/{bachelor}', [StudentReceiptController::class, 'storeWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.bachelor.create');
        // Soft delete bachelor receipt
        Route::delete('student-receipts/{bachelor}/{id}', [StudentReceiptController::class, 'softDelete'])
            ->name('student-receipts-action-delete')
            ->middleware('can:student-receipts.bachelor.cancel');

        // ============= High school receipts =============

        // Index high-school receipt
        Route::get('student-receipts/high-school', [StudentReceiptController::class, 'index'])
            ->name('student-receipts.high-school.index')
            ->middleware('can:student-receipts.high-school.index');
        // Create high-school receipt
        Route::get('student-receipts/{high-school}/create', [StudentReceiptController::class, 'createWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.high-school.create');
        // Show high-school receipt
        Route::get('student-receipts/{high-school}/{id}', [StudentReceiptController::class, 'showByEducationalSystem'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.high-school.show');
        // Edit high-school receipt
        Route::get('student-receipts/{high-school}/{id}/edit', [StudentReceiptController::class, 'editReceipt'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.high-school.edit');
        // Update high-school receipt
        Route::put('student-receipts/{high-school}/{id}', [StudentReceiptController::class, 'updateReceipt'])
            ->name('student-receipts-educational-system.update')
            ->middleware('can:student-receipts.high-school.edit');
        // Store high-school receipt
        Route::post('student-receipts/{high-school}', [StudentReceiptController::class, 'storeWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.high-school.create');
        // Soft delete high-school receipt
        Route::delete('student-receipts/{high-school}/{id}', [StudentReceiptController::class, 'softDelete'])
            ->name('student-receipts-action-delete')
            ->middleware('can:student-receipts.high-school.cancel');

        // ============= Elementary school receipts =============

        // Index elementary-school receipt
        Route::get('student-receipts/elementary-school', [StudentReceiptController::class, 'index'])
            ->name('student-receipts.elementary-school.index')
            ->middleware('can:student-receipts.elementary-school.index');
        // Create elementary-school receipt
        Route::get('student-receipts/{elementary-school}/create', [StudentReceiptController::class, 'createWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.elementary-school.create');
        // Show elementary-school receipt
        Route::get('student-receipts/{elementary-school}/{id}', [StudentReceiptController::class, 'showByEducationalSystem'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.elementary-school.show');
        // Edit elementary-school receipt
        Route::get('student-receipts/{elementary-school}/{id}/edit', [StudentReceiptController::class, 'editReceipt'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.elementary-school.edit');
        // Update elementary-school receipt
        Route::put('student-receipts/{elementary-school}/{id}', [StudentReceiptController::class, 'updateReceipt'])
            ->name('student-receipts-educational-system.update')
            ->middleware('can:student-receipts.elementary-school.edit');
        // Store elementary-school receipt
        Route::post('student-receipts/{elementary-school}', [StudentReceiptController::class, 'storeWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.elementary-school.create');
        // Soft delete elementary-school receipt
        Route::delete('student-receipts/{elementary-school}/{id}', [StudentReceiptController::class, 'softDelete'])
            ->name('student-receipts-action-delete')
            ->middleware('can:student-receipts.elementary-school.cancel');

        // ============= Kindergarten receipts =============

        // Index kindergarten receipt
        Route::get('student-receipts/kindergarten', [StudentReceiptController::class, 'index'])
            ->name('student-receipts.kindergarten.index')
            ->middleware('can:student-receipts.kindergarten.index');
        // Create kindergarten receipt
        Route::get('student-receipts/{kindergarten}/create', [StudentReceiptController::class, 'createWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.kindergarten.create');
        // Show kindergarten receipt
        Route::get('student-receipts/{kindergarten}/{id}', [StudentReceiptController::class, 'showByEducationalSystem'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.kindergarten.show');
        // Edit kindergarten receipt
        Route::get('student-receipts/{kindergarten}/{id}/edit', [StudentReceiptController::class, 'editReceipt'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.kindergarten.edit');
        // Update kindergarten receipt
        Route::put('student-receipts/{kindergarten}/{id}', [StudentReceiptController::class, 'updateReceipt'])
            ->name('student-receipts-educational-system.update')
            ->middleware('can:student-receipts.kindergarten.edit');
        // Store kindergarten receipt
        Route::post('student-receipts/{kindergarten}', [StudentReceiptController::class, 'storeWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.kindergarten.create');
        // Soft delete kindergarten receipt
        Route::delete('student-receipts/{kindergarten}/{id}', [StudentReceiptController::class, 'softDelete'])
            ->name('student-receipts-action-delete')
            ->middleware('can:student-receipts.kindergarten.cancel');

        // ============= Nursery school receipts =============

        // Index nursery-school receipt
        Route::get('student-receipts/nursery-school', [StudentReceiptController::class, 'index'])
            ->name('student-receipts.nursery-school.index')
            ->middleware('can:student-receipts.nursery-school.index');
        // Create nursery-school receipt
        Route::get('student-receipts/{nursery-school}/create', [StudentReceiptController::class, 'createWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.nursery-school.create');
        // Show nursery-school receipt
        Route::get('student-receipts/{nursery-school}/{id}', [StudentReceiptController::class, 'showByEducationalSystem'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.nursery-school.show');
        // Edit nursery-school receipt
        Route::get('student-receipts/{nursery-school}/{id}/edit', [StudentReceiptController::class, 'editReceipt'])
            ->name('student-receipts-educational-system.show')
            ->middleware('can:student-receipts.nursery-school.edit');
        // Update nursery-school receipt
        Route::put('student-receipts/{nursery-school}/{id}', [StudentReceiptController::class, 'updateReceipt'])
            ->name('student-receipts-educational-system.update')
            ->middleware('can:student-receipts.nursery-school.edit');
        // Store nursery-school receipt
        Route::post('student-receipts/{nursery-school}', [StudentReceiptController::class, 'storeWithEducationalSystem'])
            ->name('student-receipts-educational-system.create')
            ->middleware('can:student-receipts.nursery-school.create');
        // Soft delete nursery-school receipt
        Route::delete('student-receipts/{nursery-school}/{id}', [StudentReceiptController::class, 'softDelete'])
            ->name('student-receipts-action-delete')
            ->middleware('can:student-receipts.nursery-school.cancel');

        // ============= Other receipts =============

        Route::get('other-receipts', [OtherReceiptController::class, 'index'])
            ->name('other-receipts.index')
            ->middleware('can:student-receipts.other-receipts.index');

        Route::get('other-receipts/create', [OtherReceiptController::class, 'create'])
            ->name('other-receipts.create')
            ->middleware('can:student-receipts.other-receipts.create');
        // Store university receipt

        Route::post('other-receipts', [OtherReceiptController::class, 'store'])
            ->name('other-receipts-create')
            ->middleware('can:other-receipts-create');

        // ============= EXU receipts =============

        // Index unique exam receipt
        Route::get('exu-receipts', [UniqueExamReceiptController::class, 'index'])
            ->name('exu-receipts.index')
            ->middleware('can:exu-receipts.index');
        // Create unique exam receipt
        Route::get('exu-receipts/create', [UniqueExamReceiptController::class, 'create'])
            ->name('exu-receipts.create')
            ->middleware('can:exu-receipts.create');
        // Show unique exam receipt
        Route::get('exu-receipts/{id}', [UniqueExamReceiptController::class, 'show'])
            ->name('exu-receipts.show')
            ->middleware('can:exu-receipts.show');
        // Edit unique exam receipt
        Route::get('exu-receipts/{id}/edit', [UniqueExamReceiptController::class, 'edit'])
            ->name('exu-receipts.edit')
            ->middleware('can:exu-receipts.edit');
        // Update unique exam receipt
        Route::put('exu-receipts/{id}', [UniqueExamReceiptController::class, 'update'])
            ->name('exu-receipts.update')
            ->middleware('can:exu-receipts.edit');
        // Store unique exam receipt
        Route::post('exu-receipts', [UniqueExamReceiptController::class, 'store'])
            ->name('exu-receipts.store')
            ->middleware('can:exu-receipts.edit');
        // Soft delete unique exam receipt
        Route::delete('exu-receipts/{id}', [UniqueExamReceiptController::class, 'softDelete'])
            ->name('exu-receipts.delete')
            ->middleware('can:exu-receipts.cancel');
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
