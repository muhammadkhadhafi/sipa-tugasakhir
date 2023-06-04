<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\MasterData\Pegawai;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $rules = [
            'nama' => ['required', 'max:255'],
            'jenis_kelamin' => 'required|',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ];

        if ($request->username != $pegawai->username) {
            $rules['username'] = ['required', 'unique:admin__pegawai', 'min:3', 'max:255'];
        };

        if ($pegawai->nip != $request->nip) {
            $rules['nip'] = ['required', 'unique:admin__pegawai'];
        };

        if ($request->password) {
            $rules['password'] = 'required|min:5|max:255';
        }

        if ($request->file('foto')) {
            $rules['foto'] = 'image|file|max:1024';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('foto')) {
            if ($pegawai->foto) {
                Storage::delete($pegawai->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('admin/master-data/pegawai');
        }

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        Pegawai::where('id', $pegawai->id)->update($validatedData);

        return redirect('/admin/profile')->with('success', 'Profile berhasil diperbaharui');
    }
}
