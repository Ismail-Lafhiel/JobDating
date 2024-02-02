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

// home page
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Admin routes
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/announcements', [AdminController::class, 'announcements_data'])->name('admin.announcements');
    Route::get('/admin/companies', [AdminController::class, 'companies_data'])->name('admin.companies');

    // Announcement routes without index and show
    Route::resource("announcements", AnnouncementController::class, ['except' => ['index', 'show']]);

    // Company routes without index and show
    Route::resource("companies", CompanyController::class, ['except' => ['index', 'show']]);
});

// Announcement routes for only index and show
Route::resource("announcements", AnnouncementController::class, ['only' => ['index', 'show']]);

// Company routes for only index and show
Route::resource("companies", CompanyController::class, ['only' => ['index', 'show']]);