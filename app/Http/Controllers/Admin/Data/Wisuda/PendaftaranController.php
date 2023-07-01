<?php

namespace App\Http\Controllers\Admin\Data\Wisuda;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\wisudaTahun;
use App\Models\Admin\Data\WisudaPendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('admin.data.wisuda.pendaftaran.index', [
            'list_pendaftaran' => WisudaPendaftaran::where('status', 1)->latest()->get()
        ]);
    }

    public function show(WisudaPendaftaran $pendaftaran)
    {
        return view('admin.data.wisuda.pendaftaran.show', [
            'pendaftaran' => $pendaftaran
        ]);
    }

    public function verifikasi(WisudaPendaftaran $pendaftaran)
    {
        $pendaftaran['status'] = 2;
        $pendaftaran->update();

        $tahun_pendaftaran = $pendaftaran->created_at->year;
        $tahun_wisuda = wisudaTahun::whereYear('created_at', $tahun_pendaftaran)->first();
        if ($tahun_wisuda === null) {
            $tahun_wisuda_new = wisudaTahun::create(['tahun_wisuda' => $tahun_pendaftaran]);
            $pendaftaran->id_wisudatahun = $tahun_wisuda_new->id;
            $pendaftaran->update();
        } else {
            $pendaftaran->id_wisudatahun = $tahun_wisuda->id;
            $pendaftaran->update();
        }

        return redirect('/admin/wisuda/pendaftaran')->with('success', 'Pendaftaran berhasil diverifikasi');
    }

    public function tolak(WisudaPendaftaran $pendaftaran, Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi_pendaftaran_ditolak' => ['required']
        ]);

        $validatedData['status'] = 3;

        $pendaftaran->update($validatedData);

        return redirect('/admin/wisuda/pendaftaran')->with('success', 'Pendaftaran berhasil ditolak');
    }
}
