<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        if(Auth::attempt($request->only('nik', 'email', 'password'))){
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with('loginFailed', 'Login gagal NIK dan Nama tidak ditemukan');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('logoutSuccess', 'Anda telah berhasil logout');
    }

}
