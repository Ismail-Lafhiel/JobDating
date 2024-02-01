<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

//admin routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'announcements_data'])->name('dashboard');
    Route::get('/admin/announcements', [AdminController::class, 'announcements_data'])->name('admin.announcements');
    Route::get('/admin/companies', [AdminController::class, 'companies_data'])->name('admin.companies');
});

//announcements routes

//apply auth middleware to create, edit, delete and update
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource("announcements", AnnouncementController::class, ['except' => ['index', 'show']]);
});
Route::resource("announcements", AnnouncementController::class, ['only' => ['index', 'show']]);

// companies routes

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource("companies", CompanyController::class, ['except' => ['index', 'show']]);
});
Route::resource("companies", CompanyController::class, ['only' => ['index', 'show']]);