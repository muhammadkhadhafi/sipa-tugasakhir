<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Data\SuratKeteranganAktifCatatan;
use App\Models\Admin\Data\SuratKeteranganAktifPengajuan;

class PengajuanSuratKeteranganAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.pengajuansuratketeranganaktif.index', [
            'list_pengajuan' => SuratKeteranganAktifPengajuan::where('id_mahasiswa', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.pengajuansuratketeranganaktif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kontak_admin = SuratKeteranganAktifCatatan::first()->kontak_admin;
        $validatedData = $request->validate([
            'semester' => 'required',
            'no_hp' => 'required',
            'nama_orang_tua' => 'required',
            'pekerjaan_orang_tua' => 'required',
            'deskripsi_pengajuan' => 'required',
        ]);

        $validatedData['id_mahasiswa'] = auth()->user()->id;
        $validatedData['status'] = 1;

        SuratKeteranganAktifPengajuan::create($validatedData);

        return redirect('mahasiswa/pengajuansuratketeranganaktif')->with('success', 'Pengajuan berhasil disimpan, segera konfirmasi ke: ' . $kontak_admin);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeteranganAktifPengajuan $pengajuansuratketeranganaktif)
    {
        return view('mahasiswa.pengajuansuratketeranganaktif.show', [
            'pengajuan' => $pengajuansuratketeranganaktif,
            'kontak_admin' => SuratKeteranganAktifCatatan::first()->kontak_admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeteranganAktifPengajuan $pengajuansuratketeranganaktif)
    {

        return view('mahasiswa.pengajuansuratketeranganaktif.edit', [
            'pengajuan' => $pengajuansuratketeranganaktif
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeteranganAktifPengajuan $pengajuansuratketeranganaktif)
    {
        $kontak_admin = SuratKeteranganAktifCatatan::first()->kontak_admin;

        $validatedData = $request->validate([
            'semester' => 'required',
            'no_hp' => 'required',
            'nama_orang_tua' => 'required',
            'pekerjaan_orang_tua' => 'required',
            'deskripsi_pengajuan' => 'required',
        ]);

        SuratKeteranganAktifPengajuan::where('id', $pengajuansuratketeranganaktif->id)->update($validatedData);

        return redirect('mahasiswa/pengajuansuratketeranganaktif')->with('success', 'Pengajuan berhasil disimpan, segera konfirmasi ke: ' . $kontak_admin);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeteranganAktifPengajuan $pengajuansuratketeranganaktif)
    {
        if ($pengajuansuratketeranganaktif->surat_keterangan_aktif) {
            Storage::delete($pengajuansuratketeranganaktif->surat_keterangan_aktif);
        }
        SuratKeteranganAktifPengajuan::destroy('id', $pengajuansuratketeranganaktif->id);

        return redirect('mahasiswa/pengajuansuratketeranganaktif')->with('success', 'Pengajuan berhasil dihapus');
    }
}
