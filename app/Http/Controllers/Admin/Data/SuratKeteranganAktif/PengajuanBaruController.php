<?php

namespace App\Http\Controllers\Admin\Data\SuratKeteranganAktif;

use App\Http\Controllers\Controller;
use App\Models\Admin\Data\SuratKeteranganAktifPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class PengajuanBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data.pengajuansuratketeranganaktif.pengajuanbaru.index', [
            'list_pengajuan' => SuratKeteranganAktifPengajuan::where('status', 1)->latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeteranganAktifPengajuan $pengajuanbaru)
    {
        return view('admin.data.pengajuansuratketeranganaktif.pengajuanbaru.show', [
            'pengajuan' => $pengajuanbaru
        ]);
    }

    public function uploadSurat(Request $request, SuratKeteranganAktifPengajuan $pengajuanbaru)
    {
        $validatedData = $request->validate([
            'surat_keterangan_aktif' => ['required', 'file', 'max:512']
        ]);

        $validatedData['status'] = 2;
        if ($request->file('surat_keterangan_aktif')) {
            if ($pengajuanbaru->surat_keterangan_aktif) {
                Storage::delete($pengajuanbaru->surat_keterangan_aktif);
            }

            $validatedData['surat_keterangan_aktif'] = $request->file('surat_keterangan_aktif')->store('admin/data/suratketeranganaktif');
        }

        SuratKeteranganAktifPengajuan::where('id', $pengajuanbaru->id)->update($validatedData);

        return redirect('/admin/suratketeranganaktif/pengajuanbaru')->with('success', 'Surat berhasil disimpan');
    }

    public function tolakPengajuan(Request $request, SuratKeteranganAktifPengajuan $pengajuanbaru)
    {
        $validatedData = $request->validate([
            'deskripsi_pengajuan_ditolak' => ['required']
        ]);

        $validatedData['status'] = 3;

        SuratKeteranganAktifPengajuan::where('id', $pengajuanbaru->id)->update($validatedData);

        return redirect('/admin/suratketeranganaktif/pengajuanbaru')->with('success', 'Pengajuan berhasil ditolak');
    }

    public function downloadSurat(SuratKeteranganAktifPengajuan $downloadsurat)
    {
        $templatePath = public_path('assets/document/sk_aktif_template.docx');
        $outputPath = public_path('assets/document/suratketeranganaktif.docx');

        if ($downloadsurat->semester == 1) {
            $semester = 'I (Satu)';
        } elseif ($downloadsurat->semester == 2) {
            $semester = 'II (Dua)';
        } elseif ($downloadsurat->semester == 3) {
            $semester = 'III (Tiga)';
        } elseif ($downloadsurat->semester == 4) {
            $semester = 'IV (Empat)';
        } elseif ($downloadsurat->semester == 5) {
            $semester = 'V (Lima)';
        } elseif ($downloadsurat->semester == 6) {
            $semester = 'VI (Enam)';
        } elseif ($downloadsurat->semester == 7) {
            $semester = 'VII (Tujuh)';
        } elseif ($downloadsurat->semester == 8) {
            $semester = 'VIII (Delapan)';
        }

        $nim = str_replace(' ', '', $downloadsurat->mahasiswa->nim);

        if ($downloadsurat->mahasiswa->prodi->program == 'DIII') {
            $diploma = 'Diploma Tiga (D3)';
        } else {
            $diploma = 'Diploma Empat (D4)';
        }

        if ($downloadsurat->semester % 2 == 0) {
            $semester_ganjil_genap = 'genap';
        } else {
            $semester_ganjil_genap = 'ganjil';
        }

        // Logika tahun ajaran
        $tahun_sekarang = date('Y');
        $semester_sekarang = $downloadsurat->semester;
        if ($semester_sekarang % 2 == 1) {
            $tahun_ajaran = $tahun_sekarang . '/' . ($tahun_sekarang + 1);
        } else {
            $tahun_ajaran = ($tahun_sekarang - 1) . '/' . $tahun_sekarang;
        }
        // End

        $phpWord = new TemplateProcessor($templatePath);
        $phpWord->setValues([
            'tahun' => date('Y'),
            'nama' => $downloadsurat->mahasiswa->nama,
            'tempat_lahir' => $downloadsurat->mahasiswa->tempat_lahir,
            'tanggal_lahir' => $downloadsurat->mahasiswa->tanggal_lahir_string,
            'nim' => $nim,
            'jurusan' => $downloadsurat->mahasiswa->prodi->jurusan->nama,
            'prodi' => $downloadsurat->mahasiswa->prodi->nama,
            'semester' => $semester,
            'nama_orang_tua' => $downloadsurat->nama_orang_tua,
            'pekerjaan_orang_tua' => $downloadsurat->pekerjaan_orang_tua,
            'alamat' => $downloadsurat->mahasiswa->alamat,
            'diploma' => $diploma,
            'semester_ganjil_genap' => $semester_ganjil_genap,
            'tanggal_surat' => $downloadsurat->tanggal_surat_string,
            'tahun_ajaran' => $tahun_ajaran,
        ]);
        $phpWord->saveAs($outputPath);

        return Response::download($outputPath, 'SKA - ' . $downloadsurat->mahasiswa->nama . '.docx')->deleteFileAfterSend(true);
    }
}
