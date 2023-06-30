<?php

namespace App\Http\Controllers\Admin\Data\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\Pengaduan;
use Illuminate\Http\Request;

class RiwayatPengaduanController extends Controller
{
    public function index()
    {
        return view('admin.data.pengaduan.riwayatpengaduan.index', [
            'list_pengaduan' => Pengaduan::whereIn('status', [2, 3])->latest()->get()
        ]);
    }

    public function show(Pengaduan $riwayatpengaduan)
    {
        return view('admin.data.pengaduan.riwayatpengaduan.show', [
            'pengaduan' => $riwayatpengaduan
        ]);
    }

    public function editDeskripsiTindakLanjut(Request $request, Pengaduan $riwayatpengaduan)
    {
        $validatedData = $request->validate([
            'deskripsi_tindak_lanjut' => 'required'
        ]);

        Pengaduan::where('id', $riwayatpengaduan->id)->update($validatedData);

        return back()->with('success', 'Deskripsi tindak lanjut berhasil disimpan');
    }

    public function prosesUlang(Pengaduan $riwayatpengaduan)
    {
        $riwayatpengaduan['deskripsi_tindak_lanjut'] = null;
        $riwayatpengaduan['status'] = 1;
        $riwayatpengaduan->save();

        return redirect('/admin/pengaduan/riwayatpengaduan')->with('success', 'Pengaduan berhasil diproses ulang');
    }
}
