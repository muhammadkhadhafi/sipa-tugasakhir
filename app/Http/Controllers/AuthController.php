<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::guard('mahasiswa')->check()) {
            return redirect('/');
        }

        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $is_mahasiswa = null;
        $userid = $request->userid;
        if ($userid) {
            $userid = str_replace(" ", "", $userid);
            $strlen = Str::length($userid);
            if ($strlen == 17) {
                $field = 'nip';
            } else if ($strlen == 10) {
                $field = 'nim';
                $is_mahasiswa = 'mahasiswa';
            } else {
                $field = 'username';
            }
        }

        $credential = [
            $field => $request->userid,
            'password' => $request->password
        ];

        $remember = (isset($request->remember)) ? true : false;
        if ($is_mahasiswa) {
            if (Auth::guard('mahasiswa')->attempt($credential, $remember)) {
                $request->session()->regenerate();
                return redirect('/mahasiswa/dashboard');
            }
            return back()->with('danger', 'Login gagal, silahkan cek kembali user id dan password anda');
        } else {
            if (Auth::attempt($credential, $remember)) {
                $request->session()->regenerate();
                return redirect('/admin/dashboard');
            }
            return back()->with('danger', 'Login gagal, silahkan cek kembali user id dan password anda');
        }
    }

    public function logout()
    {
        Auth::logout();
        Auth::guard('mahasiswa')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
