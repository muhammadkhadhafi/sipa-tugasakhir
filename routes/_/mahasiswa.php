<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa\PengajuanSuratKeteranganAktifController;

Route::get('/dashboard', function () {
  return view('mahasiswa.dashboard');
});

Route::resource('pengajuansuratketeranganaktif', PengajuanSuratKeteranganAktifController::class);
