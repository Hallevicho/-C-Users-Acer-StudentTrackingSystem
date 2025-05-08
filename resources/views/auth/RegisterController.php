<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login'); // Make sure this Blade view exists
    }

    // Handle login logic
    public function login(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Regenerate session to prevent session fixation
            $request->session()->regenerate();

            // Redirect to intended or dashboard
            return redirect()->intended(route('dashboard'));
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
}
