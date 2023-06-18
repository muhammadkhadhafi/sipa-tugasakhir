<?php

namespace App\Http\Controllers;

use App\Models\Admin\MasterData\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            $userid = str_replace(' ', '', $userid);
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

        if ($is_mahasiswa) {
            $nim = $userid;
            $credential = [
                $field => Str::substr($nim, 0, 3) . ' ' . Str::substr($nim, 3, 4) . ' ' . Str::substr($nim, 7),
                'password' => $request->password
            ];
        } else {
            $credential = [
                $field => $request->userid,
                'password' => $request->password
            ];
        }

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

    public function gantiPassword()
    {
        $list_mahasiswa = Mahasiswa::all();
        foreach ($list_mahasiswa as $mahasiswa) {
            $passwordBaru = $mahasiswa->nim;
            $passwordReplace = str_replace(' ', '', $passwordBaru);
            $passwordHash = Hash::make($passwordReplace);
            $mahasiswa->where('id', $mahasiswa->id)->update(['password' => $passwordHash]);
        }
    }
}
