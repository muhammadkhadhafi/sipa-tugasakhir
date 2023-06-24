<?php

namespace App\Http\Controllers\Admin\Data\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\Pengaduan;
use Illuminate\Http\Request;

class PengaduanSelesaiController extends Controller
{
    public function index()
    {
        return view('admin.data.pengaduan.pengaduanselesai.index', [
            'list_pengaduan' => Pengaduan::whereIn('status', [2, 3])->latest()->get()
        ]);
    }

    public function show(Pengaduan $pengaduanselesai)
    {
        return view('admin.data.pengaduan.pengaduanselesai.show', [
            'pengaduan' => $pengaduanselesai
        ]);
    }

    public function editDeskripsiTindakLanjut(Request $request, Pengaduan $pengaduanselesai)
    {
        $validatedData = $request->validate([
            'deskripsi_tindak_lanjut' => 'required'
        ]);

        Pengaduan::where('id', $pengaduanselesai->id)->update($validatedData);

        return back()->with('success', 'Deskripsi tindak lanjut berhasil disimpan');
    }

    public function prosesUlang(Pengaduan $pengaduanselesai)
    {
        $pengaduanselesai['deskripsi_tindak_lanjut'] = null;
        $pengaduanselesai['status'] = 1;
        $pengaduanselesai->save();

        return redirect('/admin/pengaduan/pengaduanselesai')->with('success', 'Pengaduan berhasil diproses ulang');
    }
}
