<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Jika belum login maka hanya bisa mengakses route ini
Route::middleware(['guest'])->group(function () {
    Route::get('/sesi', [SesionController::class, 'index'])->name('login');
    Route::post('/sesi/login', [SesionController::class, 'login']);
    Route::get('/sesi/register', [SesionController::class, 'register']);
    Route::post('/sesi/create', [SesionController::class, 'create']);
});
//jika sudah login dan mencoba mengakses login/register maka akan dialih kan ke dashboard
Route::get('/home', function () {
    return redirect('/');
});
//route ini bisa di akses atau di jalankan jika sudah dalam keadaan login
Route::middleware(['auth'])->group(function () {
    Route::resource('/', DashboardController::class);
    Route::resource('kelas', KelasController::class)->middleware('userAkses:Admin');
    Route::resource('siswa', SiswaController::class)->middleware('userAkses:Admin');
    Route::resource('guru', GuruController::class)->middleware('userAkses:Admin');
    Route::resource('mapel', MapelController::class)->middleware('userAkses:Admin');
    Route::resource('nilai', NilaiController::class)->middleware('userAkses:Admin,Guru,Siswa');
    Route::get('get-siswa-by-kelas/{kelas_id}', [NilaiController::class, 'getSiswaByKelas'])->middleware('userAkses:Admin,Guru,Siswa');
    Route::resource('pengguna', AdminController::class)->middleware('userAkses:Admin');
    Route::get('/sesi/logout', [SesionController::class, 'logout']);
});
