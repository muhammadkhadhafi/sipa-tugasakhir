<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::redirect('/', 'admin/dashboard');

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('admin/profile', [ProfileController::class, 'index']);
    Route::get('admin/profile/edit', [ProfileController::class, 'edit']);
    Route::put('admin/profile/{pegawai}', [ProfileController::class, 'update']);

    Route::prefix('admin')->group(function () {
        include "_/admin.php";
    });
});

Route::middleware('auth:mahasiswa')->group(function () {
    Route::redirect('/', 'mahasiswa/dashboard');

    Route::get('mahasiswa/dashboard', function () {
        return view('mahasiswa.dashboard');
    });

    Route::prefix('mahasiswa')->group(function () {
        include "_/mahasiswa.php";
    });
});
