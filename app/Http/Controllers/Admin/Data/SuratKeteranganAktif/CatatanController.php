<?php

namespace App\Http\Controllers\Admin\Data\SuratKeteranganAktif;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\SuratKeteranganAktifCatatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index()
    {
        return view('admin.data.suratketeranganaktif.catatan.index', [
            'catatan' => SuratKeteranganAktifCatatan::first()
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'kontak_admin' => 'required'
        ]);

        SuratKeteranganAktifCatatan::first()->update($validatedData);
        return back()->with('success', 'Catatan berhasil disimpan');
    }
}
