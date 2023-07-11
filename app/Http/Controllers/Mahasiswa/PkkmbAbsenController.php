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

    public function getPersentaseKehadiran($jumlah_kehadiran, $jumlah_pertemuan)
    {
        return ($jumlah_pertemuan != 0) ? ($jumlah_kehadiran / $jumlah_pertemuan) * 100 : 0;
    }

    public function rekapAbsen(PkkmbGrup $rekap)
    {
        $list_anggota = $rekap->mahasiswa;

        $list_anggota = $list_anggota->transform(function ($mahasiswa) {
            $jumlah_pertemuan = $mahasiswa->pkkmbGrup->pkkmbPertemuan ? $mahasiswa->pkkmbGrup->pkkmbPertemuan->count() : 0;
            $mahasiswa->persentaseKehadiran = $this->getPersentaseKehadiran($mahasiswa->pkkmbAbsen->count(), $jumlah_pertemuan);
            return $mahasiswa;
        });

        return view('mahasiswa.pkkmb.koor.rekapabsen', [
            'grup' => $rekap,
            'list_anggota' => $list_anggota->sortByDesc('nim')
        ]);
    }
}
