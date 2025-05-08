<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login logic
    public function login(Request $request)
    {
        // Validate the email and password
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Attempt to log in the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Prevent session fixation
            return redirect()->intended('/dashboard'); // Redirect to the dashboard
        }

        // If authentication fails, return back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}

