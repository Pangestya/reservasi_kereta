<?php
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Dashboard user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.dashboard');
});

// Dashboard admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/trains', [AdminController::class, 'manageTrains'])->name('admin.trains');
    Route::get('/schedules', [AdminController::class, 'manageSchedules'])->name('admin.schedules');
    Route::get('/verify-ticket/{bookingCode}', [AdminController::class, 'verifyTicket'])->name('admin.verifyTicket');
});