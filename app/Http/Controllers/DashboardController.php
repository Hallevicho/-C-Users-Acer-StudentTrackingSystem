<?php

// DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Show the dashboard
    public function show()
    {
        return view('dashboard');
    }

    // Update user profile
    public function update(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'school' => 'required|string|max:255',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user details
        $user->update([
            'firstname' => $validated['firstname'],
            'middlename' => $validated['middlename'],
            'lastname' => $validated['lastname'],
            'course' => $validated['course'],
            'school' => $validated['school'],
        ]);

        // Return a success message (or redirect back with a success notification)
        return back()->with('success', 'Profile updated successfully!');
    }
}
