<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Data\PkkmbAbsen;
use App\Models\Admin\Data\PkkmbGrup;
use App\Models\Admin\Data\PkkmbIzin;
use App\Models\Admin\Data\PkkmbPertemuan;
use Illuminate\Support\Facades\Storage;

class PkkmbKoorController extends Controller
{
    public function getGrup()
    {
        $list_grup = PkkmbGrup::all();
        $id_koor = auth()->user()->id;
        $grup = null;

        foreach ($list_grup as $grupItem) {
            if ($grupItem->is_koor_1 == $id_koor || $grupItem->is_koor_2 == $id_koor) {
                $grup = $grupItem;
            }
        }

        return $grup;
    }

    public function index()
    {
        $grup = $this->getGrup();

        return view('mahasiswa.pkkmb.koor.index', [
            'grup' => $grup,
            'list_pertemuan' => $grup->pkkmbPertemuan->sortByDesc('tanggal_pertemuan'),
        ]);
    }

    public function show(PkkmbPertemuan $koor)
    {
        return view('mahasiswa.pkkmb.koor.show', [
            'pertemuan' => $koor,
            'list_hadir' => $koor->pkkmbAbsen->pluck('mahasiswa'),
            'list_izin' => $koor->pkkmbIzin->where('status', 'izin'),
            'list_sakit' => $koor->pkkmbIzin->where('status', 'sakit'),
        ]);
    }

    public function create()
    {
        $grup = $this->getGrup();

        return view('mahasiswa.pkkmb.koor.create', [
            'list_anggota' => $grup->mahasiswa->sortBy('nim')
        ]);
    }

    public function store(Request $request)
    {
        $grup = $this->getGrup();

        $rulesPertemuan = [
            'materi_kegiatan' => 'required:max:255',
            'bukti_kegiatan' => 'required|image|file|max:2000',
            'tanggal_pertemuan' => 'required'
        ];

        $validatedPertemuan = $request->validate($rulesPertemuan);
        $validatedPertemuan['id_pkkmb_grup'] = $grup->id;
        $validatedPertemuan['bukti_kegiatan'] = $request->file('bukti_kegiatan')->store('admin/data/pkkmb/pertemuan');
        $newPertemuan = PkkmbPertemuan::create($validatedPertemuan);

        if ($request->absen) {
            $error = false;

            foreach ($request->absen as $id => $absen) {
                if ($absen === 'hadir') {
                    $newAbsen = new PkkmbAbsen;
                    $newAbsen->id_pkkmb_pertemuan = $newPertemuan->id;
                    $newAbsen->id_mahasiswa = $id;
                    $newAbsen->save();
                } elseif ($absen === 'izin' || $absen === 'sakit') {
                    $newIzin = new PkkmbIzin;
                    $newIzin->id_pkkmb_pertemuan = $newPertemuan->id;
                    $newIzin->id_mahasiswa = $id;
                    $newIzin->status = $absen;

                    if ($request->hasFile('bukti') && isset($request->file('bukti')[$id])) {
                        $newIzin->bukti = $request->file('bukti')[$id]->store('admin/data/pkkmb/izin');
                        $newIzin->save();
                    } else {
                        $error = true;
                        PkkmbAbsen::where('id_pkkmb_pertemuan', $newPertemuan->id)->delete();
                        $list_izintersimpan = PkkmbIzin::where('id_pkkmb_pertemuan', $newPertemuan->id)->get();
                        foreach ($list_izintersimpan as $izin) {
                            Storage::delete($izin->bukti);
                            $izin->delete();
                        }
                        break;
                    }
                }
            }

            if ($error) {
                Storage::delete($newPertemuan->bukti_kegiatan);
                PkkmbPertemuan::destroy('id', $newPertemuan->id);
                return back()->with('danger', 'Absensi gagal, karena salah satu izin atau sakit tidak menginputkan bukti!');
            }
        }

        return redirect('/mahasiswa/pkkmb/koor')->with('success', 'Pertemuan baru berhasil disimpan');
    }

    public function destroy(PkkmbPertemuan $koor)
    {
        if ($koor->pkkmbAbsen) {
            foreach ($koor->pkkmbAbsen as $absen) {
                PkkmbAbsen::destroy('id', $absen->id);
            }
        }

        if ($koor->pkkmbIzin) {
            foreach ($koor->pkkmbIzin as $izin) {
                if ($izin->bukti) {
                    Storage::delete($izin->bukti);
                }
                pkkmbIzin::destroy('id', $izin->id);
            }
        }

        Storage::delete($koor->bukti_kegiatan);
        PkkmbPertemuan::destroy('id', $koor->id);

        return back()->with('success', 'Pertemuan berhasil dihapus');
    }

    public function getPersentaseKehadiran($jumlah_kehadiran, $jumlah_pertemuan)
    {
        return ($jumlah_pertemuan != 0) ? ($jumlah_kehadiran / $jumlah_pertemuan) * 100 : 0;
    }

    public function rekapAbsen()
    {
        $grup = $this->getGrup();
        $list_anggota = $grup->mahasiswa;

        $list_anggota = $list_anggota->transform(function ($mahasiswa) {
            $jumlah_pertemuan = $mahasiswa->pkkmbGrup->pkkmbPertemuan ? $mahasiswa->pkkmbGrup->pkkmbPertemuan->count() : 0;
            $mahasiswa->persentaseKehadiran = $this->getPersentaseKehadiran($mahasiswa->pkkmbAbsen->count(), $jumlah_pertemuan);
            return $mahasiswa;
        });

        return view('mahasiswa.pkkmb.koor.rekapabsen', [
            'grup' => $grup,
            'list_anggota' => $list_anggota->sortByDesc('nim'),
        ]);
    }
}
