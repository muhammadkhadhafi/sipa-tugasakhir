<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::redirect('/', 'admin/dashboard');

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('admin/profile', function () {
        return view('admin.profile');
    });

    Route::prefix('admin')->group(function () {
        include "_/admin.php";
    });
});

// Route::middleware('auth:mahasiswa')->group(function () {
//     Route::get('/mahasiswa/dashboard', function () {
//         return view('mahasiswa.dashboard');
//     });

//     Route::prefix('mahasiswa')->group(function () {
//         include "_/mahasiswa.php";
//     });
// });
