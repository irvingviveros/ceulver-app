<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StaterkitController;
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

// Schools
Route::get('administrator/manage-schools', [SchoolController::class, 'index'])->name('manage-schools');
Route::get('administrator/manage-schools/create', [SchoolController::class, 'create']);
Route::post('administrator/manage-schools', [SchoolController::class, 'store']);

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
