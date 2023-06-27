<?php

use App\Http\Controllers\Mahasiswa\PembayaranController;
use App\Http\Controllers\Mahasiswa\PendaftaranWisudaController;
use App\Http\Controllers\Mahasiswa\PengaduanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa\PengajuanSuratKeteranganAktifController;
use App\Http\Controllers\Mahasiswa\ProfileController;

Route::get('/dashboard', function () {
  return view('mahasiswa.dashboard');
});

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::put('/profile/{mahasiswa}', [ProfileController::class, 'update']);

Route::resource('/pengajuansuratketeranganaktif', PengajuanSuratKeteranganAktifController::class);
Route::resource('/pengaduan', PengaduanController::class);
Route::resource('/pembayaran', PembayaranController::class)->except(['edit', 'update']);  // Route ini akan digantikan dengan pendaftaran wisuda

Route::get('/pendaftaranwisuda', [PendaftaranWisudaController::class, 'index']);
Route::post('/pendaftaranwisuda', [PendaftaranWisudaController::class, 'uploadBerkasPendaftaranWisuda']);
Route::post('/pendaftaranwisuda/pembayaran/{pendaftaran}', [PendaftaranWisudaController::class, 'pembayaran']);
