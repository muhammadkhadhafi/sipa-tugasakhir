<?php

namespace App\Http\Controllers\Admin\Data\Wisuda;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\WisudaHarga;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function index()
    {
        return view('admin.data.wisuda.harga.index', [
            'harga_wisuda' => WisudaHarga::first()
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'harga' => ['required']
        ]);

        WisudaHarga::first()->update($validatedData);

        return back()->with('success', 'Harga wisuda berhasil disimpan');
    }
}
