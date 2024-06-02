<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminLoginController extends Controller
{
    public function show(){
        return view("login.show");
    }
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email'=>$email, 'password'=>$password];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return to_route('admins.index');
        }else{
            return back()->withErrors([
                'email'=>'email ou mot de passe incorrect.'
            ]);
        }
    }
}
