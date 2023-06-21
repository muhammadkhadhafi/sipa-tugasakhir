<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\MasterData\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('admin.master-data.mahasiswa.index', [
            'mahasiswas' => Mahasiswa::latest()->get()
        ]);
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('admin.master-data.mahasiswa.show', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.master-data.mahasiswa.edit', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $rules = [];
        if ($request->password) {
            $rules['password'] = 'required|min:5|max:255';
        };

        $validatedData = $request->validate($rules);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        };

        Mahasiswa::where('id', $mahasiswa->id)->update($validatedData);
        return redirect('/admin/master-data/mahasiswa')->with('success', 'Mahasiswa berhasil disimpan');
    }
}
