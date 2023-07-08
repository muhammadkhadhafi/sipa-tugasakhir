<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\PkkmbGrup;
use Illuminate\Http\Request;

class PkkmbAbsenController extends Controller
{
    public function index()
    {
        $grup = optional(PkkmbGrup::where('id', auth()->user()->id_pkkmb_grup)->first());

        return view('mahasiswa.pkkmb.absen.index', [
            'list_pertemuan' => $grup->pkkmbPertemuan ?? [],
        ]);
    }
}
