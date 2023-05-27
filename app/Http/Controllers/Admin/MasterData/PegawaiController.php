<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Admin\MasterData\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('admin.master-data.pegawai.index', [
            'pegawais' => Pegawai::all()
        ]);
    }
}
