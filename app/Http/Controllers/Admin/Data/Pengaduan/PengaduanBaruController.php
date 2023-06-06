<?php

namespace App\Http\Controllers\Admin\Data\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\Pengaduan;
use Illuminate\Http\Request;

class PengaduanBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data.pengaduan.pengaduanbaru.index', [
            'list_pengaduan' => Pengaduan::where('status', 1)->latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduanbaru)
    {
        return view('admin.data.pengaduan.pengaduanbaru.show', [
            'pengaduan' => $pengaduanbaru
        ]);
    }

    public function deskripsiTindakLanjut(Pengaduan $pengaduanbaru, Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi_tindak_lanjut' => 'required'
        ]);
        $validatedData['status'] = 2;

        // Pengaduan::where('id', $pengaduanbaru->id)->update($validatedData);
        Pengaduan::where('id', $pengaduanbaru->id)->update($validatedData);

        return redirect('/admin/pengaduan/pengaduanbaru')->with('success', 'Deskripsi tindak lanjut berhasil disimpan');
    }
}
