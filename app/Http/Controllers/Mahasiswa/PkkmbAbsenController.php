<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\PkkmbGrup;
use App\Models\Admin\Data\PkkmbPertemuan;
use Illuminate\Http\Request;

class PkkmbAbsenController extends Controller
{
    public function index()
    {
        $grup = optional(PkkmbGrup::where('id', auth()->user()->id_pkkmb_grup)->first());

        return view('mahasiswa.pkkmb.absen.index', [
            'grup' => $grup,
            'list_pertemuan' => $grup->pkkmbPertemuan->sortByDesc('tanggal_pertemuan') ?? [],
        ]);
    }


    public function show(PkkmbPertemuan $absen)
    {
        return view('mahasiswa.pkkmb.absen.show', [
            'pertemuan' => $absen,
            'list_hadir' => $absen->pkkmbAbsen->pluck('mahasiswa'),
            'list_izin' => $absen->pkkmbIzin->where('status', 'izin'),
            'list_sakit' => $absen->pkkmbIzin->where('status', 'sakit')
        ]);
    }
}
