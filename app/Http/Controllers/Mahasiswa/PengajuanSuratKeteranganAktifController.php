<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Data\PengajuanSuratKeteranganAktif;

class PengajuanSuratKeteranganAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('mahasiswa.pengajuansuratketeranganaktif.index', [
            'list_pengajuan' => PengajuanSuratKeteranganAktif::where('id_mahasiswa', auth()->user()->id)->latest()->get()
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

        $validatedData = $request->validate([
            'deskripsi' => 'required',
        ]);

        $validatedData['id_mahasiswa'] = auth()->user()->id;
        $validatedData['status'] = 1;

        PengajuanSuratKeteranganAktif::create($validatedData);

        return redirect('mahasiswa/pengajuansuratketeranganaktif')->with('success', 'Pengajuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanSuratKeteranganAktif $pengajuansuratketeranganaktif)
    {
        return view('mahasiswa.pengajuansuratketeranganaktif.show', [
            'pengajuan' => $pengajuansuratketeranganaktif
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanSuratKeteranganAktif $pengajuanSuratKeteranganAktif)
    {

        return view('mahasiswa.pengajuansuratketeranganaktif.edit', [
            'pengajuan' => $pengajuanSuratKeteranganAktif
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
