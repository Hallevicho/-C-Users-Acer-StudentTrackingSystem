<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ✅ Quote Landing Page (always shown first)
Route::get('/', function () {
    return view('quote-landing');
})->name('quote.landing');

// ✅ POST: After quotes, allow login
Route::post('/go-to-login', function () {
    session(['allow_login' => true]);
    return response()->json(['success' => true]);
})->name('goToLogin');

// ✅ POST: Set quote session (used by quote-landing for fallback logic or compatibility)
Route::post('/set-quote-session', function () {
    session(['quote_landing_done' => true]);
    return response()->json(['success' => true]);
})->name('setQuoteSession');

// ✅ GET: Create Account Choice Page
Route::get('/create-account', function () {
    return view('auth.createAccountChoice');
})->name('create.account');

// ✅ GET: Show Registration Form
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// ✅ POST: Handle Registration Submission
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// ✅ GET: Show Login Page (only allowed after quote landing)
Route::get('/login', function () {
    if (!session('allow_login')) {
        return redirect()->route('quote.landing');
    }
    return app(AuthController::class)->showAuthPage();
})->name('login');

// ✅ POST: Handle Login Submission
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// ✅ POST: Handle Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
