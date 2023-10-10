<?php

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

Route::middleware('role:admin')->get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::middleware('role:admin')->get('/pengunjung', [App\Http\Controllers\AdminController::class, 'pengguna'])->name('pengunjung');
Route::middleware('role:admin')->get('/management', [App\Http\Controllers\ManajemenPengunjung::class, 'index'])->name('management');
Route::resource('management', App\Http\Controllers\ManajemenPengunjung::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/historykunjungan', [App\Http\Controllers\HistoryKunjungan::class, 'index'])->name('historykunjungan');
Route::get('/surveikepuasan', [App\Http\Controllers\SurveiKepuasan::class, 'index'])->name('surveikepuasan');
Route::get('/historypeminjaman', [App\Http\Controllers\HistoryPeminjaman::class, 'index'])->name('historypeminjaman');
Route::get('/bebastanggungan', [App\Http\Controllers\BebasTanggungan::class, 'index'])->name('bebastanggungan');

#ini presensi
Route::get('/presensi', [App\Http\Controllers\BottombarController::class, 'index'])->name('presensi');
Route::get('/geolokasi', [App\Http\Controllers\BottombarController::class, 'geolokasi'])->name('geolokasi');
Route::get('/facescan', [App\Http\Controllers\BottombarController::class, 'facescan'])->name('facescan');

#ini profile
Route::get('/profile', [App\Http\Controllers\BottombarController::class, 'profile'])->name('profile');
Route::post('/profile', [App\Http\Controllers\BottombarController::class, 'update'])->name('profile');

