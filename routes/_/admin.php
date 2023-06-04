<?php

use App\Http\Controllers\Admin\Data\PengajuanSuratKeteranganAktif\PengajuanBaruController;
use App\Http\Controllers\Admin\Data\PengajuanSuratKeteranganAktif\PengajuanSelesaiController;
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
Route::resource('/master-data/mahasiswa', MahasiswaController::class)->middleware('can:masterdata');

// Pengajuan Surat Keterangan Aktif
Route::resource('/pengajuansuratketeranganaktif/pengajuanbaru', PengajuanBaruController::class)->except(['store', 'create', 'edit', 'update', 'destroy']);
Route::put('/pengajuansuratketeranganaktif/pengajuanbaru/uploadsurat/{pengajuanbaru}', [PengajuanBaruController::class, 'uploadSurat']);
Route::put('/pengajuansuratketeranganaktif/pengajuanbaru/tolakpengajuan/{pengajuanbaru}', [PengajuanBaruController::class, 'tolakPengajuan']);

Route::resource('/pengajuansuratketeranganaktif/pengajuanselesai', PengajuanSelesaiController::class)->except(['store', 'create', 'edit', 'update', 'destroy']);
Route::put('/pengajuansuratketeranganaktif/pengajuanselesai/prosesulang/{pengajuanselesai}', [PengajuanSelesaiController::class, 'prosesUlang']);
Route::put('pengajuansuratketeranganaktif/pengajuanselesai/uploadulang/{pengajuanselesai}', [PengajuanSelesaiController::class, 'uploadUlang']);
Route::put('pengajuansuratketeranganaktif/pengajuanselesai/ubahdeskripsipengajuanditolak/{pengajuanselesai}', [PengajuanSelesaiController::class, 'ubahDeskripsiPengajuanDitolak']);
// End