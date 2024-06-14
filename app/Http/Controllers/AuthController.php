<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('loginpage');
    }

    public function loginpage(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
            $fieldType = 'email';
        } else {
            $fieldType = 'contact_number';
        }

        if (Auth::attempt([$fieldType => $credentials['email'], 'password' => $credentials['password']])) {
           
            return redirect()->intended('/home');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
