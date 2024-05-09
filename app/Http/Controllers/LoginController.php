<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $credentials = ['email'=>$email, 'password'=>$password];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return to_route('dashboard');
        }else{
            return back()->withErrors([
                'email'=>'email ou mot de passe incorrect.'
            ]);
        }
    }
}
