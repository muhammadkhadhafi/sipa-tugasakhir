<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.pengaduan.index', [
            'list_pengaduan' => Pengaduan::where('id_mahasiswa', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pengaduan $pengaduan)
    {
        $pengaduan['judul_pengaduan'] = $request['judul_pengaduan'];
        $pengaduan['deskripsi_pengaduan'] = $request['deskripsi_pengaduan'];
        $pengaduan['nama_bukti_pengaduan'] = $request['nama_bukti_pengaduan'];
        $pengaduan['status'] = 1;
        $pengaduan['id_mahasiswa'] = auth()->user()->id;
        if ($request->file('file_bukti_pengaduan')) {
            $pengaduan['file_bukti_pengaduan'] = $request->file('file_bukti_pengaduan')->store('admin/data/pengaduan');
        }
        $pengaduan->save();

        return redirect('mahasiswa/pengaduan')->with('success', 'Pengaduan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('mahasiswa.pengaduan.show', [
            'pengaduan' => $pengaduan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        return view('mahasiswa.pengaduan.edit', [
            'pengaduan' => $pengaduan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $pengaduan['judul_pengaduan'] = $request['judul_pengaduan'];
        $pengaduan['deskripsi_pengaduan'] = $request['deskripsi_pengaduan'];
        $pengaduan['nama_bukti_pengaduan'] = $request['nama_bukti_pengaduan'];
        if ($request->file('file_bukti_pengaduan')) {
            if ($pengaduan->file_bukti_pengaduan) {
                Storage::delete($pengaduan->file_bukti_pengaduan);
            }
            $pengaduan['file_bukti_pengaduan'] = $request->file('file_bukti_pengaduan')->store('admin/data/pengaduan');
        }
        $pengaduan->save();

        return redirect('mahasiswa/pengaduan')->with('success', 'Pengaduan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->file_bukti_pengaduan) {
            Storage::delete($pengaduan->file_bukti_pengaduan);
        }

        Pengaduan::destroy('id', $pengaduan->id);

        return redirect('mahasiswa/pengaduan')->with('success', 'Pengaduan berhasil dihapus');
    }
}
