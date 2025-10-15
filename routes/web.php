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
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReminderController;

// Each view gets their own routing and controller under one prefix named "admin"

// PS: Jgn buatkan controller yg buatkan semua at once, code confirm gaduh nanti
Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('bookings', BookingController::class);
    Route::resource('users', UserController::class);
    Route::resource('reminders', ReminderController::class);
});