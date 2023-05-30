<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $userid = $request->userid;
        if ($userid) {
            $userid = str_replace(" ", "", $userid);
            $strlen = Str::length($userid);
            if ($strlen == 17) {
                $field = 'nip';
            } else {
                $field = 'username';
            }
        }

        $credential = [
            $field => $request->userid,
            'password' => $request->password
        ];

        $remember = (isset($request->remember)) ? true : false;
        if (Auth::attempt($credential, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        return back()->with('danger', 'Login gagal, silahkan cek kembali user id dan password anda');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
