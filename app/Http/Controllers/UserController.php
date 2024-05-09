<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('pages.users.users-create');
    }
    public function store(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }
}
