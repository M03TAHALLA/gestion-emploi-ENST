<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:sous_admins,email']);

        $token = Str::random(60);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        $resetLink = route('password.reset', ['token' => $token]);
        Mail::send('emails.password_reset', ['resetLink' => $resetLink], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Password Reset Link');
        });

        return back()->with('status', 'Nous avons envoyé un lien de réinitialisation de mot de passe par e-mail !');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:sous_admins,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $passwordReset = DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $request->token, 'created_at' => now()]
        );

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Invalid token!']);
        }

        $sousAdmin = SousAdmin::where('email', $request->email)->first();
        $sousAdmin->password = Hash::make($request->password);
        $sousAdmin->save();

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('home')->with('status', 'Password has been reset!');
    }
}
