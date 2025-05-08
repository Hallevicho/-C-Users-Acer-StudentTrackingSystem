<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// ✅ Quote Landing Page
Route::get('/', function () {
    return view('quote-landing');
})->name('quote.landing');

// ✅ Session control after quote clicks
Route::post('/go-to-login', function () {
    session(['allow_login' => true]);
    return response()->json(['success' => true]);
})->name('goToLogin');

Route::post('/set-quote-session', function () {
    session(['quote_landing_done' => true]);
    return response()->json(['success' => true]);
})->name('setQuoteSession');

// ✅ Account creation flow
Route::get('/create-account', function () {
    return view('auth.createAccountChoice');
})->name('create.account');

// ✅ Register routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit'); // Ensure the correct route for registration

// ✅ Login routes (outside auth middleware)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// ✅ Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ✅ Authenticated routes
// Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::put('/dashboard/clear-fields', [DashboardController::class, 'clearfields'])->name('dashboard.clearfields');
    Route::put('/dashboard/update', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/delete', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
// });
