<?php

use App\Http\Controllers\Mahasiswa\PendaftaranWisudaController;
use App\Http\Controllers\Mahasiswa\PengaduanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa\PengajuanSuratKeteranganAktifController;
use App\Http\Controllers\Mahasiswa\PkkmbAbsenController;
use App\Http\Controllers\Mahasiswa\PkkmbKoorController;
use App\Http\Controllers\Mahasiswa\ProfileController;

Route::get('/dashboard', function () {
  return view('mahasiswa.dashboard');
});

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::put('/profile/{mahasiswa}', [ProfileController::class, 'update']);

Route::resource('/pengajuansuratketeranganaktif', PengajuanSuratKeteranganAktifController::class);

Route::resource('/pengaduan', PengaduanController::class);

Route::get('/pendaftaranwisuda', [PendaftaranWisudaController::class, 'index']);
Route::post('/pendaftaranwisuda', [PendaftaranWisudaController::class, 'uploadBerkasPendaftaranWisuda']);
Route::post('/pendaftaranwisuda/pembayaran/{pendaftaran}', [PendaftaranWisudaController::class, 'pembayaran']);

Route::get('/pkkmb/absen', [PkkmbAbsenController::class, 'index']);
Route::get('/pkkmb/absen/detailpertemuan/{absen}', [PkkmbAbsenController::class, 'show']);

Route::resource('/pkkmb/koor', PkkmbKoorController::class)->middleware('can:is_koor_pkkmb')->except(['edit', 'update']);
