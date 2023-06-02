<?php

use App\Http\Controllers\Admin\MasterData\MahasiswaController;
use App\Http\Controllers\Admin\MasterData\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::resource('master-data/pegawai', PegawaiController::class)->middleware('can:masterdata');
Route::resource('master-data/mahasiswa', MahasiswaController::class)->middleware('can:masterdata');
