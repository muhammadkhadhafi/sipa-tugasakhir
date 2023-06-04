<?php

namespace App\Http\Controllers\Admin\Data\PengajuanSuratKeteranganAktif;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\PengajuanSuratKeteranganAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajuanBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data.pengajuansuratketeranganaktif.pengajuanbaru.index', [
            'list_pengajuan' => PengajuanSuratKeteranganAktif::where('status', 1)->latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanSuratKeteranganAktif $pengajuanbaru)
    {
        return view('admin.data.pengajuansuratketeranganaktif.pengajuanbaru.show', [
            'pengajuan' => $pengajuanbaru
        ]);
    }

    public function uploadSurat(Request $request, PengajuanSuratKeteranganAktif $pengajuanbaru)
    {
        $validatedData = $request->validate([
            'surat_keterangan_aktif' => ['required', 'file', 'max:512']
        ]);

        $validatedData['status'] = 2;
        if ($request->file('surat_keterangan_aktif')) {
            if ($pengajuanbaru->surat_keterangan_aktif) {
                Storage::delete($pengajuanbaru->surat_keterangan_aktif);
            }

            $validatedData['surat_keterangan_aktif'] = $request->file('surat_keterangan_aktif')->store('admin/data/pengajuansuratketeranganaktif');
        }

        PengajuanSuratKeteranganAktif::where('id', $pengajuanbaru->id)->update($validatedData);

        return redirect('/admin/pengajuansuratketeranganaktif/pengajuanbaru')->with('success', 'Surat berhasil disimpan');
    }

    public function tolakPengajuan(Request $request, PengajuanSuratKeteranganAktif $pengajuanbaru)
    {
        $validatedData = $request->validate([
            'deskripsi_pengajuan_ditolak' => ['required']
        ]);

        $validatedData['status'] = 3;

        PengajuanSuratKeteranganAktif::where('id', $pengajuanbaru->id)->update($validatedData);

        return redirect('/admin/pengajuansuratketeranganaktif/pengajuanbaru')->with('success', 'Pengajuan berhasil ditolak');
    }
}
