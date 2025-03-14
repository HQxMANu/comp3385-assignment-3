<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
        // Show login form
        public function create()
        {
            return view('auth.login'); // Ensure this Blade file exists
        }
    
        // Handle login request
        public function store(Request $request)
        {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard')->with('success', 'Login successful');
            }

            return back()->withErrors([
                'email' => 'Invalid credentials. Check the email address and password entered.',
            ]);
        }

        public function logout(Request $request)
        {
            Auth::logout();
    
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/')->with('success', 'You have been logged out.');
        }

}
