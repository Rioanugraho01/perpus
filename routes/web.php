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
Route::middleware('role:admin')->get('/manajemenpengunjung', [App\Http\Controllers\ManajemenPengunjung::class, 'index'])->name('manajemenpengunjung');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/historykunjungan', [App\Http\Controllers\HistoryKunjungan::class, 'index'])->name('historykunjungan');
Route::get('/surveikepuasan', [App\Http\Controllers\SurveiKepuasan::class, 'index'])->name('surveikepuasan');
Route::get('/historypeminjaman', [App\Http\Controllers\HistoryPeminjaman::class, 'index'])->name('historypeminjaman');
Route::get('/bebastanggungan', [App\Http\Controllers\BebasTanggungan::class, 'index'])->name('bebastanggungan');
Route::get('/presensi', [App\Http\Controllers\PresensiController::class, 'index'])->name('presensi');
Route::get('/geolokasi', [App\Http\Controllers\PresensiController::class, 'geolokasi'])->name('geolokasi');

