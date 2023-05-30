<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function store_register(Request $req){
        $data = $req->except(['_token','_method']);
        $data['password'] = Hash::make($data['password']);
        if(User::create($data)){
            return redirect('/login');
        }else{
            return back();
        }
        

    }
}