<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('auth.register'); // This should return the registration form view
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {


        // Validate the form inputs
        $this->validateRegistration($request);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'faculty' => $request->faculty,
        ]);

        // to check if data reaches the controller
        dd($request->all());
        // Fire the registered event
        event(new Registered($user));

        // Log the user in after registration
        auth()->login($user);

        return redirect()->route('dashboard')->with('status', 'Registration successful!');
    }

    /**
     * Validate the registration request.
     */
    protected function validateRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'faculty' => 'required|string|max:255',
        ]);
    }
}
