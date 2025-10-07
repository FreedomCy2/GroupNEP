<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

// Public routes (Laravel)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Laravel Breeze (with email verification)
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
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

// Auth routes (Laravel Breeze)
require __DIR__.'/auth.php';

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

// Admin view routes 
Route::get('admin/home', [DashboardController::class, 'index'])->name('admin.home');