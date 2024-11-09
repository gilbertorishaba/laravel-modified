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
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register'); // Ensure you have a 'register' view to render the form.
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
            'username' => $request->username, // Added username field
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country, // Added country field
        ]);

        // Fire the registered event
        event(new Registered($user));

        // Log the user in after registration
        auth()->login($user);

        // Redirect to the dashboard or wherever you want the user to land after registration
        return redirect()->route('dashboard')->with('status', 'Registration successful!');
    }

    /**
     * Validate the registration request.
     */
    protected function validateRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users', // Validate username
            'email' => 'required|string|email|max:255|unique:users', // Validate email
            'password' => 'required|string|min:8|confirmed', // Password validation
            'country' => 'required|string|max:255', // Validate country selection
        ]);
    }
}
