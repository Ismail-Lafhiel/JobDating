<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

// Announcement routes for only index and show
Route::resource("announcements", AnnouncementController::class, ['only' => ['index', 'show']]);

// Company routes for only index and show
Route::resource("companies", CompanyController::class, ['only' => ['index', 'show']]);



Route::middleware(['auth'])->group(function () {
    Route::post('/apply/{announcement}', [ApplicationController::class, 'apply'])->name('apply.announcement');
    Route::get('/applied-announcements', [ApplicationController::class, 'appliedAnnouncements'])->name('applied.announcements');
    Route::delete('/applied-announcements/{announcement}',  [ApplicationController::class, 'deleteAppliedAnnouncement'])->name('delete.applied.announcement');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});
