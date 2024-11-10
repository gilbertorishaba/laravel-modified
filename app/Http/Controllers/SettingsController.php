<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;

class SettingsController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        return view('settings.index', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate the input data
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'current_password' => 'nullable|current_password', // Laravel 9+ has built-in password validation rule
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Update user information
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }

        $user->save();

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
