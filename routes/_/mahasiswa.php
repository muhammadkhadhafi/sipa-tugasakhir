<?php

use App\Http\Controllers\Admin\Data\PengajuanSuratKeteranganAktifController;
use Illuminate\Support\Facades\Route;

Route::resource('pengajuansuratketeranganaktif', PengajuanSuratKeteranganAktifController::class);
