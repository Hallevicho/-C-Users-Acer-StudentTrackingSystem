<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update($request->only(['firstname', 'lastname', 'middlename', 'course', 'school']));
        return redirect()->route('dashboard')->with('success', 'Info updated!');
    }

    public function clearFields()
    {
        $user = auth()->user();
        $user->update([
            'firstname' => null,
            'lastname' => null,
            'middlename' => null,
            'course' => null,
            'school' => null,
        ]);
        return redirect()->route('dashboard')->with('success', 'Fields cleared.');
    }

    public function destroy()
    {
        $user = auth()->user();
        $user->delete();
        return redirect('/')->with('success', 'Account deleted.');
    }
}

