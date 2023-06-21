<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Admin\MasterData\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('mahasiswa.profile.index');
    }

    public function edit()
    {
        return view('mahasiswa.profile.edit');
    }

    public function update(Request $request)
    {
        $rules = [];

        if ($request->password) {
            $rules['password'] = 'required|min:3|max:255';
        }

        $validatedData = $request->validate($rules);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        Mahasiswa::where('id', auth()->user()->id)->update($validatedData);

        return redirect('mahasiswa/profile')->with('success', 'Profile berhasil diperbarui');
    }
}
