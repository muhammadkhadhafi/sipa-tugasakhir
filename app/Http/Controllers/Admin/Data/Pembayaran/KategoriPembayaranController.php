<?php

namespace App\Http\Controllers\Admin\Data\Pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\KategoriPembayaran;
use Illuminate\Http\Request;

class KategoriPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data.pembayaran.kategoripembayaran.index', [
            'list_kategoripembayaran' => KategoriPembayaran::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.data.pembayaran.kategoripembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_pembayaran' => ['required', 'unique:admin__pembayaran__kategori_pembayarans'],
            'harga' => ['required']
        ]);

        KategoriPembayaran::create($validatedData);

        return redirect('admin/pembayaran/kategoripembayaran')->with('success', 'Kategori pembayaran berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriPembayaran $kategoripembayaran)
    {
        return view('admin.data.pembayaran.kategoripembayaran.show', [
            'kategori' => $kategoripembayaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriPembayaran $kategoripembayaran)
    {
        return view('admin.data.pembayaran.kategoripembayaran.edit', [
            'kategori' => $kategoripembayaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriPembayaran $kategoripembayaran)
    {
        $rules = [
            'harga' => 'required'
        ];

        if ($request->kategori_pembayaran != $kategoripembayaran->kategori_pembayaran) {
            $rules['kategori_pembayaran'] = ['required', 'unique:admin__pembayaran__kategori_pembayarans'];
        }

        $validatedData = $request->validate($rules);

        $kategoripembayaran->where('id', $kategoripembayaran->id)->update($validatedData);

        return redirect('admin/pembayaran/kategoripembayaran')->with('success', 'Kategori pembayaran berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriPembayaran $kategoripembayaran)
    {
        // if ($kategoripembayaran->pembayaran) {
        //     $kategoripembayaran->pembayaran->delete();
        // }
        if ($kategoripembayaran->pembayaran()->exists()) {
            $kategoripembayaran->pembayaran()->delete();
        }
        KategoriPembayaran::destroy('id', $kategoripembayaran->id);

        return redirect('admin/pembayaran/kategoripembayaran')->with('success', 'Kategori pembayaran berhasil dihapus');
    }
}
