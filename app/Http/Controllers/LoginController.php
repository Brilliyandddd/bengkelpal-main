<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {

        return view('login', [
            'judul' => 'login',

        ]);
    }
    public function Login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //jika username ada
        $user = DB::table('users')->where('username', $request->username)->first();

        //jika password benar
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                session([
                    'isLogin' => true,
                    'username' => $user->username,
                ]);
                // return redirect('/'.$request->role);
                return redirect('/dashboard');
            }
            //jika password salah
            return redirect('/login')->with('error_password', 'Password Tidak Sesuai');
        }

        //jika username tidak ada
        return redirect('/login')->with('error_username', 'Username Tidak Ditemukan');
    }

    public function Logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
