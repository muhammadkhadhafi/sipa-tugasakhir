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
//     return view('welcome');
// });

Route::get('/', function () {
    if (auth()->guard('mahasiswa')->check()) {
        return redirect('/mahasiswa/dashboard');
    } else {
        return redirect('/admin/dashboard');
    }
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginProcess']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        include "_/admin.php";
    });
});

Route::middleware('auth:mahasiswa')->group(function () {
    Route::prefix('mahasiswa')->group(function () {
        include "_/mahasiswa.php";
    });
});
