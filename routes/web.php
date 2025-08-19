<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

// Public home page
Route::get('/', function () {
    return view('welcome');
});

// Role-based dashboards (only for authenticated users)
Route::middleware(['auth'])->group(function () {
    // Default User Dashboard
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('dashboard');

    // Dedicated dashboards
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::get('/saler/dashboard', [DashboardController::class, 'saler'])->name('dashboard.saler');

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Login routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

});

// Auth routes (login, register)
require __DIR__.'/auth.php';
