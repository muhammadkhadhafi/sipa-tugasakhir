<?php

namespace App\Http\Controllers\Admin\Data\Wisuda;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\WisudaPendaftaran;
use App\Models\Admin\Data\WisudaTahun;

class TahunController extends Controller
{
    public function index()
    {
        return view('admin.data.wisuda.tahunwisuda.index', [
            'list_tahunwisuda' => WisudaTahun::latest()->get()
        ]);
    }

    public function show(WisudaTahun $tahunwisuda)
    {
        return view('admin.data.wisuda.tahunwisuda.show', [
            'tahun_wisuda' => $tahunwisuda->created_at->year,
            'list_pendaftaran' => $tahunwisuda->pendaftaran()->latest()->get()
        ]);
    }

    public function detailpeserta(WisudaPendaftaran $peserta)
    {
        return view('admin.data.wisuda.tahunwisuda.detailpeserta', [
            'tahun_wisuda' => $peserta->tahun_wisuda->created_at->year,
            'peserta' => $peserta
        ]);
    }

    public function batalverifikasi(WisudaPendaftaran $peserta)
    {
        $peserta->status = 1;
        $peserta->id_wisudatahun = null;
        $peserta->update();

        return redirect('/admin/wisuda/tahunwisuda')->with('success', 'Verifikasi berhasil dibatalkan');
    }
}
