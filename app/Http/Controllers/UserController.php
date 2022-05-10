<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function halamanRegister()
    {
        return view('pages.register');
    }

    public function simpanUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'nik' => 'required|unique:users,nik',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->with('registerFailed', 'Registrasi tidak berhasil');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'password' => bcrypt($request->password)
        ];

        User::create($data);
        return redirect()->route('login')->with('registerSuccess', "Registrasi telah berhasil, silahkan login!");
    }
}
