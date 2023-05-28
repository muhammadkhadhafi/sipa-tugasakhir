<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\MasterData\Pegawai;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('admin.master-data.pegawai.index', [
            'pegawais' => Pegawai::all()
        ]);
    }

    public function create()
    {
        return view('admin.master-data.pegawai.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => ['required', 'max:255'],
            'username' => ['required', 'unique:admin__pegawai', 'min:3', 'max:255'],
            'nip' => ['required', 'unique:admin__pegawai'],
            'password' => 'required|min:5|max:255',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['password'] = Hash::make($validatedData['password']);

        Pegawai::create($validatedData);

        return redirect('/admin/master-data/pegawai')->with('success', 'Pegawai berhasil ditambahkan');
    }
}
