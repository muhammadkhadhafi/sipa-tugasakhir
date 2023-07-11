<?php

use App\Http\Controllers\Admin\Data\Pengaduan\PengaduanBaruController;
use App\Http\Controllers\Admin\Data\Pengaduan\RiwayatPengaduanController;
use App\Http\Controllers\Admin\Data\Pkkmb\AbsenController;
use App\Http\Controllers\Admin\Data\SuratKeteranganAktif\CatatanController;
use App\Http\Controllers\Admin\Data\SuratKeteranganAktif\PengajuanBaruController;
use App\Http\Controllers\Admin\Data\SuratKeteranganAktif\RiwayatPengajuanController;
use App\Http\Controllers\Admin\Data\Wisuda\HargaController;
use App\Http\Controllers\Admin\Data\Wisuda\PendaftaranController;
use App\Http\Controllers\Admin\Data\Wisuda\TahunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MasterData\PegawaiController;
use App\Http\Controllers\Admin\MasterData\MahasiswaController;
use App\Models\Admin\Data\Pengaduan;
use App\Models\Admin\Data\SuratKeteranganAktifPengajuan;
use App\Models\Admin\Data\WisudaPendaftaran;

Route::get('/dashboard', function () {
  return view('admin.dashboard', [
    'ska_count' => SuratKeteranganAktifPengajuan::where('status', 1)->count(),
    'pendaftaran_wisuda_count' => WisudaPendaftaran::where('status', 1)->count(),
    'pengaduan_count' => Pengaduan::where('status', 1)->count()
  ]);
});

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::put('/profile/{pegawai}', [ProfileController::class, 'update']);

Route::resource('/master-data/pegawai', PegawaiController::class)->middleware('can:masterdata');
Route::resource('/master-data/mahasiswa', MahasiswaController::class)->middleware('can:masterdata')->except(['create', 'store', 'destroy']);

// Surat Keterangan Aktif
Route::resource('suratketeranganaktif/pengajuanbaru', PengajuanBaruController::class)->except(['store', 'create', 'edit', 'update', 'destroy']);
Route::put('suratketeranganaktif/pengajuanbaru/uploadsurat/{pengajuanbaru}', [PengajuanBaruController::class, 'uploadSurat']);
Route::put('suratketeranganaktif/pengajuanbaru/tolakpengajuan/{pengajuanbaru}', [PengajuanBaruController::class, 'tolakPengajuan']);
Route::post('suratketeranganaktif/pengajuanbaru/downloadsurat/{downloadsurat}', [PengajuanBaruController::class, 'downloadSurat']);

Route::resource('/suratketeranganaktif/riwayatpengajuan', RiwayatPengajuanController::class)->except(['store', 'create', 'edit', 'update', 'destroy']);
Route::put('/suratketeranganaktif/riwayatpengajuan/prosesulang/{riwayatpengajuan}', [RiwayatPengajuanController::class, 'prosesUlang']);
Route::put('suratketeranganaktif/riwayatpengajuan/uploadulang/{riwayatpengajuan}', [RiwayatPengajuanController::class, 'uploadUlang']);
Route::put('suratketeranganaktif/riwayatpengajuan/editdeskripsipengajuanditolak/{riwayatpengajuan}', [RiwayatPengajuanController::class, 'editDeskripsiPengajuanDitolak']);

Route::get('/suratketeranganaktif/catatan', [CatatanController::class, 'index']);
Route::put('/suratketeranganaktif/catatan', [CatatanController::class, 'update']);
// End

// Pengaduan
Route::resource('/pengaduan/pengaduanbaru', PengaduanBaruController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
Route::put('/pengaduan/pengaduanbaru/deskripsitindaklanjut/{pengaduanbaru}', [PengaduanBaruController::class, 'deskripsiTindakLanjut']);

Route::resource('/pengaduan/riwayatpengaduan', RiwayatPengaduanController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
Route::put('/pengaduan/riwayatpengaduan/editdeskripsitindaklanjut/{riwayatpengaduan}', [RiwayatPengaduanController::class, 'editDeskripsiTindakLanjut']);
Route::put('/pengaduan/riwayatpengaduan/prosesulang/{riwayatpengaduan}', [RiwayatPengaduanController::class, 'prosesUlang']);
// End

// Wisuda
Route::get('/wisuda/pendaftaran', [PendaftaranController::class, 'index']);
Route::get('/wisuda/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'show']);
Route::put('/wisuda/pendaftaran/verifikasi/{pendaftaran}', [PendaftaranController::class, 'verifikasi']);
Route::put('/wisuda/pendaftaran/tolak/{pendaftaran}', [PendaftaranController::class, 'tolak']);

Route::get('/wisuda/tahunwisuda', [TahunController::class, 'index']);
Route::get('/wisuda/tahunwisuda/{tahunwisuda}', [TahunController::class, 'show']);
Route::get('/wisuda/tahunwisuda/peserta/{peserta}', [TahunController::class, 'detailpeserta']);
Route::put('/wisuda/tahunwisuda/peserta/batalverifikasi/{peserta}', [TahunController::class, 'batalverifikasi']);

Route::get('/wisuda/harga', [HargaController::class, 'index']);
Route::put('/wisuda/harga', [HargaController::class, 'update']);
// End

// Pkkmb
Route::get('/pkkmb/absen', [AbsenController::class, 'index']);
Route::post('/pkkmb/absen', [AbsenController::class, 'createGrup']);
Route::get('/pkkmb/absen/detailgrup/{detailgrup}', [AbsenController::class, 'detailGrup']);
Route::put('/pkkmb/absen/detailgrup/setkoor1/{setkoor}', [AbsenController::class, 'setKoor1']);
Route::put('/pkkmb/absen/detailgrup/setkoor2/{setkoor}', [AbsenController::class, 'setKoor2']);
Route::post('/pkkmb/absen/detailgrup/sertifikatpkkmb', [AbsenController::class, 'uploadSertifikat']);
Route::get('/pkkmb/absen/rekap-absen/{rekap}', [AbsenController::class, 'rekapAbsen']);
Route::post('/pkkmb/absen/tambah-anggota/{grup}', [AbsenController::class, 'tambahAnggota']);
// End