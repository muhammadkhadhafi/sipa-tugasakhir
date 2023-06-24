<?php

namespace App\Http\Controllers\Admin\Data\SuratKeteranganAktif;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\SuratKeteranganAktifPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajuanSelesaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data.suratketeranganaktif.pengajuanselesai.index', [
            'list_pengajuan' => SuratKeteranganAktifPengajuan::whereIn('status', [2, 3])->latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeteranganAktifPengajuan $pengajuanselesai)
    {
        return view('admin.data.suratketeranganaktif.pengajuanselesai.show', [
            'pengajuan' => $pengajuanselesai
        ]);
    }

    public function prosesUlang(Request $request, SuratKeteranganAktifPengajuan $pengajuanselesai)
    {
        $pengajuanselesai->status = 1;
        $pengajuanselesai->deskripsi_pengajuan_ditolak = null;
        if ($pengajuanselesai->surat_keterangan_aktif) {
            Storage::delete($pengajuanselesai->surat_keterangan_aktif);
            $pengajuanselesai->surat_keterangan_aktif = null;
        }

        $pengajuanselesai->save();

        return redirect('/admin/suratketeranganaktif/pengajuanselesai')->with('success', 'Pengajuan berhasil diproses ulang');
    }

    public function uploadUlang(Request $request, SuratKeteranganAktifPengajuan $pengajuanselesai)
    {
        $validatedData = $request->validate([
            'surat_keterangan_aktif' => 'required|file|max:512'
        ]);

        if ($request->file('surat_keterangan_aktif')) {
            if ($pengajuanselesai->surat_keterangan_aktif) {
                Storage::delete($pengajuanselesai->surat_keterangan_aktif);
            }
            $validatedData['surat_keterangan_aktif'] = $request->file('surat_keterangan_aktif')->store('admin/data/suratketeranganaktif');
        }

        SuratKeteranganAktifPengajuan::where('id', $pengajuanselesai->id)->update($validatedData);

        return back()->with('success', 'Surat berhasil disimpan');
    }

    public function editDeskripsiPengajuanDitolak(SuratKeteranganAktifPengajuan $pengajuanselesai, Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi_pengajuan_ditolak' => 'required'
        ]);

        SuratKeteranganAktifPengajuan::where('id', $pengajuanselesai->id)->update($validatedData);

        return back()->with('success', 'Deskripsi pengajuan ditolak berhasil disimpan');
    }
}
