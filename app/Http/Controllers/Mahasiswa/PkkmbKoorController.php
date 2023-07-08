<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\PkkmbGrup;
use App\Models\Admin\Data\PkkmbPertemuan;
use Illuminate\Http\Request;

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
            'list_pertemuan' => $grup->pkkmbPertemuan,
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
        // dd($request);
        $grup = $this->getGrup();

        $rulesPertemuan = [
            'materi_kegiatan' => 'required',
            'bukti_kegiatan' => 'required|image|file|max:2000',
            'tanggal_pertemuan' => 'required'
        ];

        $validatedPertemuan = $request->validate($rulesPertemuan);
        $validatedPertemuan['id_pkkmb_grup'] = $grup->id;
        $validatedPertemuan['bukti_kegiatan'] = $request->file('bukti_kegiatan')->store('admin/data/pkkmb/pertemuan');
        PkkmbPertemuan::create($validatedPertemuan);
    }
}
