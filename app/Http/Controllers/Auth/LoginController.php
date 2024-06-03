<?php

// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('index');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('super_admin')->attempt($credentials)) {
        return redirect()->route('admins.index');
    } elseif (Auth::guard('sous_admin')->attempt($credentials)) {
        return redirect()->route('admins.index');
    }

    return back()->withErrors([
        'email' => 'Email ou mot de passe incorrect.',
    ]);
}


    public function logout(){
        Auth::guard('super_admin')->logout();
        Auth::guard('sous_admin')->logout();

        return to_route('home');
    }
}
