<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function validation(Request $req){
        $credentials = $req->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
            // 'password' => [
            //     'required',
            //     'min:8',
            //     'regex:/[a-z]/',
            //     'regex:/[A-Z]/',
            //     'regex:/[0-9]/',
            // ],
        ]);

        if(Auth::attempt($credentials)){
            $req->session()->regenerate();
            return redirect()->intended('/dashboard');
        }else{
            return back()->withErrors([
                'email' => 'The identity does not match with our data.',
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function register(){
        return view('auth.register');
    }
}
