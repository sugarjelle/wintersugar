<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookingViewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;

// Public route (homepage)
Route::get('/', function () {
    return view('welcome');
});

// Guest-only routes (registration via custom controller)
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.post');
});

Route::get('/bookings/{booking}', [App\Http\Controllers\BookingViewController::class, 'show'])->name('bookings.show');

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Bookings CRUD (excluding 'show' route)
    Route::resource('bookings', BookingViewController::class)->except(['show']);

    // Profile routes (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Notifications
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])
        ->name('notifications.markAllRead');
});

// Auth routes (login, logout, password reset, etc.)
require __DIR__.'/auth.php';