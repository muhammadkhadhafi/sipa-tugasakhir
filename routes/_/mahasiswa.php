<?php

use App\Http\Controllers\Mahasiswa\PembayaranController;
use App\Http\Controllers\Mahasiswa\PengaduanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa\PengajuanSuratKeteranganAktifController;

Route::get('/dashboard', function () {
  return view('mahasiswa.dashboard');
});

Route::resource('/pengajuansuratketeranganaktif', PengajuanSuratKeteranganAktifController::class);
Route::resource('/pengaduan', PengaduanController::class);
Route::resource('/pembayaran', PembayaranController::class)->except(['edit', 'update']);
