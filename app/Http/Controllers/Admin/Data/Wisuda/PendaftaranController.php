<?php

namespace App\Http\Controllers\Admin\Data\Wisuda;

use App\Http\Controllers\Controller;
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
