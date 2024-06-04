<?php

// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $request->session()->put('user_type', 'super_admin');
            return redirect()->route('admins.index');
        } elseif (Auth::guard('sous_admin')->attempt($credentials)) {
            $sousAdmin = Auth::guard('sous_admin')->user();
            $roles = DB::table('roles_admins')
                ->join('roles', 'roles_admins.role_id', '=', 'roles.id')
                ->where('roles_admins.id_sous_admin', $sousAdmin->id)
                ->pluck('roles.nom_role') // Utilisez le nom de colonne correct
                ->toArray();
            session(['user_roles' => $roles]); // Stocker les rôles dans la session
            $request->session()->put('user_type', 'sous_admin');
            return redirect()->route('Emploitemps.index');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }


    public function logout(Request $request)
    {
        $userType = $request->session()->get('user_type');

        if ($userType == 'super_admin') {
            Auth::guard('super_admin')->logout();
        } elseif ($userType == 'sous_admin') {
            Auth::guard('sous_admin')->logout();
        }

        $request->session()->forget('user_type');
        $request->session()->flush();

        return redirect()->route('home');
    }
}
