<?php

namespace App\Http\Controllers\Admin\Data\PengajuanSuratKeteranganAktif;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\CatatanPengajuanSuratKeteranganAktif;
use Illuminate\Http\Request;

class CatatanDitampilkanController extends Controller
{
    public function index()
    {
        return view('admin.data.pengajuansuratketeranganaktif.catatanditampilkan.index', [
            'catatan' => CatatanPengajuanSuratKeteranganAktif::first()
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'kontak_admin' => 'required'
        ]);

        CatatanPengajuanSuratKeteranganAktif::first()->update($validatedData);
        return back()->with('success', 'Catatan berhasil disimpan');
    }
}
