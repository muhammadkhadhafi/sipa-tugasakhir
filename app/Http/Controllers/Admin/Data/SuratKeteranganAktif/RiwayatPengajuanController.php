<?php

namespace App\Http\Controllers\Admin\Data\SuratKeteranganAktif;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\SuratKeteranganAktifPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RiwayatPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data.suratketeranganaktif.riwayatpengajuan.index', [
            'list_pengajuan' => SuratKeteranganAktifPengajuan::whereIn('status', [2, 3])->latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeteranganAktifPengajuan $riwayatpengajuan)
    {
        return view('admin.data.suratketeranganaktif.riwayatpengajuan.show', [
            'pengajuan' => $riwayatpengajuan
        ]);
    }

    public function prosesUlang(Request $request, SuratKeteranganAktifPengajuan $riwayatpengajuan)
    {
        $riwayatpengajuan->status = 1;
        $riwayatpengajuan->deskripsi_pengajuan_ditolak = null;
        if ($riwayatpengajuan->surat_keterangan_aktif) {
            Storage::delete($riwayatpengajuan->surat_keterangan_aktif);
            $riwayatpengajuan->surat_keterangan_aktif = null;
        }

        $riwayatpengajuan->save();

        return redirect('/admin/suratketeranganaktif/riwayatpengajuan')->with('success', 'Pengajuan berhasil diproses ulang');
    }

    public function uploadUlang(Request $request, SuratKeteranganAktifPengajuan $riwayatpengajuan)
    {
        $validatedData = $request->validate([
            'surat_keterangan_aktif' => 'required|file|max:512'
        ]);

        if ($request->file('surat_keterangan_aktif')) {
            if ($riwayatpengajuan->surat_keterangan_aktif) {
                Storage::delete($riwayatpengajuan->surat_keterangan_aktif);
            }
            $validatedData['surat_keterangan_aktif'] = $request->file('surat_keterangan_aktif')->store('admin/data/suratketeranganaktif');
        }

        SuratKeteranganAktifPengajuan::where('id', $riwayatpengajuan->id)->update($validatedData);

        return back()->with('success', 'Surat berhasil disimpan');
    }

    public function editDeskripsiPengajuanDitolak(SuratKeteranganAktifPengajuan $riwayatpengajuan, Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi_pengajuan_ditolak' => 'required'
        ]);

        SuratKeteranganAktifPengajuan::where('id', $riwayatpengajuan->id)->update($validatedData);

        return back()->with('success', 'Deskripsi pengajuan ditolak berhasil disimpan');
    }
}
