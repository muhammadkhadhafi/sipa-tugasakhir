<?php

use App\Http\Controllers\Admin\Data\Pembayaran\KategoriPembayaranController;
use App\Http\Controllers\Admin\Data\Pembayaran\PembayaranMasukController;
use App\Http\Controllers\Admin\Data\Pengaduan\PengaduanBaruController;
use App\Http\Controllers\Admin\Data\Pengaduan\PengaduanSelesaiController;
use App\Http\Controllers\Admin\Data\SuratKeteranganAktif\CatatanController;
use App\Http\Controllers\Admin\Data\SuratKeteranganAktif\PengajuanBaruController;
use App\Http\Controllers\Admin\Data\SuratKeteranganAktif\PengajuanSelesaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MasterData\PegawaiController;
use App\Http\Controllers\Admin\MasterData\MahasiswaController;


Route::get('/dashboard', function () {
  return view('admin.dashboard');
});

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::put('/profile/{pegawai}', [ProfileController::class, 'update']);

Route::resource('/master-data/pegawai', PegawaiController::class)->middleware('can:masterdata');
Route::resource('/master-data/mahasiswa', MahasiswaController::class)->middleware('can:masterdata')->except(['create', 'store', 'destroy']);

// Pengajuan Surat Keterangan Aktif
Route::resource('suratketeranganaktif/pengajuanbaru', PengajuanBaruController::class)->except(['store', 'create', 'edit', 'update', 'destroy']);
Route::put('suratketeranganaktif/pengajuanbaru/uploadsurat/{pengajuanbaru}', [PengajuanBaruController::class, 'uploadSurat']);
Route::put('suratketeranganaktif/pengajuanbaru/tolakpengajuan/{pengajuanbaru}', [PengajuanBaruController::class, 'tolakPengajuan']);
Route::post('suratketeranganaktif/pengajuanbaru/downloadsurat/{downloadsurat}', [PengajuanBaruController::class, 'downloadSurat']);

Route::resource('/suratketeranganaktif/pengajuanselesai', PengajuanSelesaiController::class)->except(['store', 'create', 'edit', 'update', 'destroy']);
Route::put('/suratketeranganaktif/pengajuanselesai/prosesulang/{pengajuanselesai}', [PengajuanSelesaiController::class, 'prosesUlang']);
Route::put('suratketeranganaktif/pengajuanselesai/uploadulang/{pengajuanselesai}', [PengajuanSelesaiController::class, 'uploadUlang']);
Route::put('suratketeranganaktif/pengajuanselesai/editdeskripsipengajuanditolak/{pengajuanselesai}', [PengajuanSelesaiController::class, 'editDeskripsiPengajuanDitolak']);

Route::get('/suratketeranganaktif/catatan', [CatatanController::class, 'index']);
Route::post('/suratketeranganaktif/catatan', [CatatanController::class, 'update']);
// End

// Pengaduan
Route::resource('/pengaduan/pengaduanbaru', PengaduanBaruController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
Route::put('/pengaduan/pengaduanbaru/deskripsitindaklanjut/{pengaduanbaru}', [PengaduanBaruController::class, 'deskripsiTindakLanjut']);

Route::resource('/pengaduan/pengaduanselesai', PengaduanSelesaiController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
Route::put('/pengaduan/pengaduanselesai/editdeskripsitindaklanjut/{pengaduanselesai}', [PengaduanSelesaiController::class, 'editDeskripsiTindakLanjut']);
Route::put('pengaduan/pengaduanselesai/prosesulang/{pengaduanselesai}', [PengaduanSelesaiController::class, 'prosesUlang']);
// End

// Pembayaran
Route::resource('pembayaran/kategoripembayaran', KategoriPembayaranController::class);
Route::get('pembayaran/pembayaranmasuk', [PembayaranMasukController::class, 'index']);
Route::get('pembayaran/pembayaranmasuk/{pembayaran}', [PembayaranMasukController::class, 'show']);
// End