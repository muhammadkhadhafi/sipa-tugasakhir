<?php

namespace App\Http\Controllers\Admin\Data\Pkkmb;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\PkkmbAbsen;
use App\Models\Admin\Data\PkkmbGrup;
use App\Models\Admin\Data\PkkmbSertifikat;
use App\Models\Admin\MasterData\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AbsenController extends Controller
{
    public function index()
    {
        return view('admin.data.pkkmb.index', [
            'list_pkkmb_grup' => PkkmbGrup::orderBy('pkkmb_tahun', 'desc')->get()
        ]);
    }

    public function createGrup()
    {
        $list_mahasiswa = Mahasiswa::whereNull('id_pkkmb_grup')->get();
        $list_pkkmb_grup = PkkmbGrup::all();

        foreach ($list_mahasiswa as $mahasiswa) {
            $assigned = false;

            foreach ($list_pkkmb_grup as $grup) {
                if ($mahasiswa->prodi->nama == $grup->prodi && $mahasiswa->angkatan == $grup->pkkmb_tahun) {
                    $mahasiswa->id_pkkmb_grup = $grup->id;
                    $mahasiswa->save();
                    $assigned = true;
                    break;
                }
            }

            if (!$assigned) {
                $grup_baru = PkkmbGrup::create(['prodi' => $mahasiswa->prodi->nama, 'pkkmb_tahun' => $mahasiswa->angkatan]);
                $mahasiswa->id_pkkmb_grup = $grup_baru->id;
                $mahasiswa->save();
                $list_pkkmb_grup->push($grup_baru);
            }
        }

        return redirect('/admin/pkkmb/absen')->with('success', 'Berhasil mengelompokkan semua mahasiswa');
    }

    public function getPersentaseKehadiran($jumlah_kehadiran, $jumlah_pertemuan)
    {
        return ($jumlah_pertemuan != 0) ? ($jumlah_kehadiran / $jumlah_pertemuan) * 100 : 0;
    }

    public function detailGrup(PkkmbGrup $detailgrup)
    {
        $list_kating = Mahasiswa::where('angkatan', $detailgrup->pkkmb_tahun - 1)
            ->whereHas('prodi', function ($query) use ($detailgrup) {
                $query->where('nama', $detailgrup->prodi);
            })->orderBy('nim')->get();

        $list_anggota = $detailgrup->mahasiswa;

        $list_anggota = $list_anggota->transform(function ($mahasiswa) {
            $jumlah_pertemuan = $mahasiswa->pkkmbGrup->pkkmbPertemuan ? $mahasiswa->pkkmbGrup->pkkmbPertemuan->count() : 0;
            $mahasiswa->persentaseKehadiran = $this->getPersentaseKehadiran($mahasiswa->pkkmbAbsen->count(), $jumlah_pertemuan);
            return $mahasiswa;
        });

        return view('admin.data.pkkmb.detail_grup.index', [
            'grup' => $detailgrup,
            'list_kating' => $list_kating,
            'list_anggota' => $list_anggota->sortBy('nim'),
        ]);
    }

    public function setKoor1(PkkmbGrup $setkoor, Request $request)
    {
        $setkoor->is_koor_1 = $request->is_koor_1;
        $setkoor->update();
        return back()->with('success', 'Koordinator 1 berhasil disimpan');
    }

    public function setKoor2(PkkmbGrup $setkoor, Request $request)
    {
        $setkoor->is_koor_2 = $request->is_koor_2;
        $setkoor->update();
        return back()->with('success', 'Koordinator 2 berhasil disimpan');
    }

    public function uploadSertifikat(Request $request)
    {
        $validatedData = $request->validate([
            'sertifikat_pkkmb' => ['required', 'file', 'max:7000']
        ]);

        $pkkmbGrup = PkkmbGrup::where('id', $request->id_pkkmb_grup)->first();

        if ($request->file('sertifikat_pkkmb')) {
            if ($pkkmbGrup->pkkmbSertifikat) {
                Storage::delete($pkkmbGrup->pkkmbSertifikat->sertifikat_pkkmb);
                PkkmbSertifikat::destroy('id_pkkmb_grup', $pkkmbGrup->pkkmbSertifikat->id);
            }
            $validatedData['sertifikat_pkkmb'] = $request->file('sertifikat_pkkmb')->store('admin/data/pkkmb/sertifikat');
        }
        $validatedData['id_pkkmb_grup'] = $request->id_pkkmb_grup;

        PkkmbSertifikat::create($validatedData);

        return back()->with('success', 'Sertifikat PKKMB berhasil disimpan');
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
            'list_anggota' => $list_anggota->sortByDesc('nim'),
        ]);
    }
}
