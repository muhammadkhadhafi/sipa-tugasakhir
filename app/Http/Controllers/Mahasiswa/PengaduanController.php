<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\Pengaduan;
use App\Models\Admin\Data\PengaduanBukti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.pengaduan.index', [
            'list_pengaduan' => Pengaduan::where('id_mahasiswa', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pengaduan $pengaduan)
    {
        $validatedData = $request->validate([
            'judul_pengaduan' => 'required|max:255',
            'deskripsi_pengaduan' => 'required',
        ]);

        $validatedData['status'] = 1;
        $validatedData['id_mahasiswa'] = auth()->user()->id;
        $newPengaduan = Pengaduan::create($validatedData);

        if ($request->nama_bukti) {
            foreach ($request->nama_bukti as $key => $value) {
                $bukti = new PengaduanBukti;
                $bukti->id_pengaduan = $newPengaduan->id;
                $bukti->nama_bukti = $value;
                if ($request->hasFile('file_bukti') && isset($request->file('file_bukti')[$key])) {
                    $bukti->file_bukti = $request->file('file_bukti')[$key]->store('admin/data/pengaduan/file_bukti');
                    $bukti->save();
                }
            }
        }

        return redirect('mahasiswa/pengaduan')->with('success', 'Pengaduan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('mahasiswa.pengaduan.show', [
            'pengaduan' => $pengaduan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->bukti) {
            foreach ($pengaduan->bukti as $bukti) {
                Storage::delete($bukti->file_bukti);
                $bukti->delete();
            }
        }

        Pengaduan::destroy('id', $pengaduan->id);

        return redirect('mahasiswa/pengaduan')->with('success', 'Pengaduan berhasil dihapus');
    }
}
