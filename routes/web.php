<?php

use App\Http\Controllers\{
    ClientController,
    RoleController,
    UserController,
    ProfileController,
    HomeController,
    JadwalUjianController,
    UjianPesertaController,
    DaftarUjianController,
    PenilaianController,
    HasilUjianController,
    HasilPesertaController
};
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware('auth')->group(function () {
//     Route::view('about', 'about')->name('about');

//     Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

//     Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
//     Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('clients', ClientController::class);

//     Route::get('getDT', [\App\Http\Controllers\ClientController::class, 'getDT'])->name('clients.getDT');
//     Route::post('clients_delete_ajax', [\App\Http\Controllers\ClientController::class, 'client_delete'])->name('clients.delete.ajax');

// });


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Akses semua role
    Route::view('about', 'about')->name('about');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});


// ----------------------------
// ADMIN ONLY
// ----------------------------
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::get('getDT', [ClientController::class, 'getDT'])->name('clients.getDT');
    Route::post('clients_delete_ajax', [ClientController::class, 'client_delete'])->name('clients.delete.ajax');
});

// ----------------------------
// PANITIA & ADMIN
// ----------------------------
Route::middleware(['auth', 'role:admin|panitia'])->group(function () {
    Route::resource('jadwal-ujian', JadwalUjianController::class);
    Route::resource('jadwal_ujian', \App\Http\Controllers\JadwalUjianController::class);
    Route::get('/peserta', [UjianPesertaController::class, 'index'])->name('peserta.index');
    Route::post('/peserta/verifikasi/{id}', [UjianPesertaController::class, 'verifikasi'])->name('peserta.verifikasi');
    Route::post('/peserta/tolak/{id}', [UjianPesertaController::class, 'tolak'])->name('peserta.tolak');

    Route::get('/hasil-ujian/{id}', [HasilUjianController::class, 'show'])->name('hasil_ujian.show');

    // Route::get('hasil-peserta/{jadwal_id}/{custom_id}', [HasilPesertaController::class, 'show'])->name('hasil_peserta.show');

    // Route::get('/hasil-peserta/{id}', [App\Http\Controllers\HasilPesertaController::class, 'show'])->name('hasil_peserta.show');
    Route::get('/hasil-ujian/peserta/{ujian_peserta_id}', [HasilUjianController::class, 'showByPanitia'])
        ->name('hasil_ujian.panitia_show');
});

// ----------------------------
// PENGUJI & ADMIN
// ----------------------------
Route::middleware(['auth', 'role:admin|penguji'])->group(function () {
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::post('/penilaian/form', [PenilaianController::class, 'form'])->name('penilaian.form');
    Route::post('/penilaian/store', [PenilaianController::class, 'store'])->name('penilaian.store');
});

// ----------------------------
// PESERTA ONLY
// ----------------------------
Route::middleware(['auth', 'role:peserta'])->group(function () {
    Route::get('daftar-ujian', [DaftarUjianController::class, 'index'])->name('daftar_ujian.index');
    Route::get('daftar-ujian/{id}', [DaftarUjianController::class, 'daftar'])->name('daftar_ujian.form');
    Route::post('daftar-ujian/{id}', [DaftarUjianController::class, 'store'])->name('daftar_ujian.store');
    Route::get('daftar-ujian/form/{jadwal}', [DaftarUjianController::class, 'form'])->name('daftar_ujian.form');

    // Peserta melihat hasil pribadi
    // Route::get('/hasil-peserta/{jadwal_id}/{custom_id}', [HasilPesertaController::class, 'show'])->name('hasil_peserta.show');
    Route::get('/hasil-peserta/{jadwal_id}/{custom_id}', [HasilPesertaController::class, 'show'])->name('hasil_peserta.show');
});


Route::middleware(['auth', 'role:admin|panitia|peserta'])->group(function () {
    Route::get('/hasil-ujian', [HasilUjianController::class, 'index'])->name('hasil_ujian.index');
});
