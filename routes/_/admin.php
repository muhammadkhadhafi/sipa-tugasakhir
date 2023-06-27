<?php

use App\Http\Controllers\Admin\Data\Pembayaran\KategoriPembayaranController;
use App\Http\Controllers\Admin\Data\Pembayaran\PembayaranMasukController;
use App\Http\Controllers\Admin\Data\Pengaduan\PengaduanBaruController;
use App\Http\Controllers\Admin\Data\Pengaduan\PengaduanSelesaiController;
use App\Http\Controllers\Admin\Data\SuratKeteranganAktif\CatatanController;
use App\Http\Controllers\Admin\Data\SuratKeteranganAktif\PengajuanBaruController;
use App\Http\Controllers\Admin\Data\SuratKeteranganAktif\PengajuanSelesaiController;
use App\Http\Controllers\Admin\Data\Wisuda\HargaController;
use App\Http\Controllers\Admin\Data\Wisuda\PendaftaranController;
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

Route::resource('/suratketeranganaktif/pengajuanselesai', PengajuanSelesaiController::class)->except(['store', 'create', 'edit', 'update', 'destroy']);
Route::put('/suratketeranganaktif/pengajuanselesai/prosesulang/{pengajuanselesai}', [PengajuanSelesaiController::class, 'prosesUlang']);
Route::put('suratketeranganaktif/pengajuanselesai/uploadulang/{pengajuanselesai}', [PengajuanSelesaiController::class, 'uploadUlang']);
Route::put('suratketeranganaktif/pengajuanselesai/editdeskripsipengajuanditolak/{pengajuanselesai}', [PengajuanSelesaiController::class, 'editDeskripsiPengajuanDitolak']);

Route::get('/suratketeranganaktif/catatan', [CatatanController::class, 'index']);
Route::put('/suratketeranganaktif/catatan', [CatatanController::class, 'update']);
// End

// Pengaduan
Route::resource('/pengaduan/pengaduanbaru', PengaduanBaruController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
Route::put('/pengaduan/pengaduanbaru/deskripsitindaklanjut/{pengaduanbaru}', [PengaduanBaruController::class, 'deskripsiTindakLanjut']);

Route::resource('/pengaduan/pengaduanselesai', PengaduanSelesaiController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
Route::put('/pengaduan/pengaduanselesai/editdeskripsitindaklanjut/{pengaduanselesai}', [PengaduanSelesaiController::class, 'editDeskripsiTindakLanjut']);
Route::put('/pengaduan/pengaduanselesai/prosesulang/{pengaduanselesai}', [PengaduanSelesaiController::class, 'prosesUlang']);
// End

// Pembayaran
Route::resource('/pembayaran/kategoripembayaran', KategoriPembayaranController::class);
Route::get('/pembayaran/pembayaranmasuk', [PembayaranMasukController::class, 'index']);
Route::get('/pembayaran/pembayaranmasuk/{pembayaran}', [PembayaranMasukController::class, 'show']);
// End

// Wisuda
Route::get('wisuda/pendaftaran', [PendaftaranController::class, 'index']);
Route::get('wisuda/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'show']);
Route::put('wisuda/pendaftaran/verifikasi/{pendaftaran}', [PendaftaranController::class, 'verifikasi']);
Route::put('wisuda/pendaftaran/tolak/{pendaftaran}', [PendaftaranController::class, 'tolak']);

Route::get('wisuda/harga', [HargaController::class, 'index']);
Route::put('wisuda/harga', [HargaController::class, 'update']);
// End