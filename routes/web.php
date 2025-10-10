<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

// Public routes (Laravel)use App\Http\Controllers\Admin\DashboardController;

Route::get('admin/home', [DashboardController::class, 'index'])->name('admin.home');

// Laravel Breeze (with email verification) [DashboardController::class, 'index'])->name('admin.home');

Route::get('/', function () {
    return
view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                'password.confirm'
            )
        )->name('two-factor.edit');
});
// Auth routes (Laravel Breeze)firmPassword'),
             

/* 
 ____     ___ __    __ 
|    \   /  _]  |__|  |
|  _  | /  [_|  |  |  |
|  |  ||    _]  |  |  |
|  |  ||   [_|  `  '  |
|  |  ||     |\      / 
|__|__||_____| \_/\_/  
*/                  

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminPagesController;

// Admin view routes 
Route::get('admin/home', [DashboardController::class, 'index'])->name('admin.home');

// Admin Dashboard
Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Other views (Bookings, Doctors, Schedule, Manage Users, Reminders, Records) under one "main" controller for simplicity
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('bookings', [AdminPagesController::class, 'index'])->name('bookings');
    Route::get('dashboard', [AdminPagesController::class, 'index'])->name('dashboard');
    Route::get('doctors', [AdminPagesController::class, 'index'])->name('doctors');
    Route::get('schedule', [AdminPagesController::class, 'index'])->name('schedule');
    Route::get('users', [AdminPagesController::class, 'index'])->name('users');
    Route::get('reminders', [AdminPagesController::class, 'index'])->name('reminders');
    Route::get('records', [AdminPagesController::class, 'index'])->name('records');

    Route::get('bookings/delete/{id}', [AdminPagesController::class, 'delete'])->name('bookings-delete');
});