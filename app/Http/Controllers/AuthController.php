<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the combined login and registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showAuthPage()
    {
        return view('auth.login'); // Use auth.blade.php for the combined form
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['login_error' => 'Invalid username or password.'])->withInput();
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ], [
            'firstname.required' => 'First name is required.',
            'lastname.required' => 'Last name is required.',
            'username.unique' => 'Username already exists.',
            'email.unique' => 'Email already exists.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    /**
     * Logout the user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login'); // Redirect to login after logout
    }
}
