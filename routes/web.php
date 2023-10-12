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


Route::group(['middleware' => 'role:admin'], function () {

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/pengunjung', [App\Http\Controllers\AdminController::class, 'pengunjung'])->name('pengunjung');
    Route::get('/management', [App\Http\Controllers\ManajemenPengunjung::class, 'index'])->name('user.index');
    
    Route::get('/user/create', [App\Http\Controllers\ManajemenPengunjung::class, 'create'])->name('user.create');
    Route::post('/user', [App\Http\Controllers\ManajemenPengunjung::class, 'store'])->name('user.store');
    Route::get('/user/{user}', [App\Http\Controllers\ManajemenPengunjung::class], 'show')->name('user.show');
    Route::get('/user/{user}/edit', [App\Http\Controllers\ManajemenPengunjung::class,'edit'])->name('user.edit');
    Route::put('/user/{user}', [App\Http\Controllers\ManajemenPengunjung::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [App\Http\Controllers\ManajemenPengunjung::class, 'destroy'])->name('user.destroy');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/history', [App\Http\Controllers\BottombarController::class, 'history'])->name('historyKunjungan');
    Route::get('/surveikepuasan', [App\Http\Controllers\SurveiKepuasan::class, 'index'])->name('surveikepuasan');
    Route::get('/historypeminjaman', [App\Http\Controllers\HistoryPeminjaman::class, 'index'])->name('historypeminjaman');
    Route::get('/bebastanggungan', [App\Http\Controllers\BebasTanggungan::class, 'index'])->name('bebastanggungan');
    
    #ini presensi
    Route::get('/presensi', [App\Http\Controllers\BottombarController::class, 'index'])->name('presensi');
    Route::get('/geolokasi', [App\Http\Controllers\BottombarController::class, 'geolokasi'])->name('geolokasi');
    Route::post('post', [App\Http\Controllers\BottombarController::class, 'post'])->name('post');
    Route::get('/facescan', [App\Http\Controllers\BottombarController::class, 'facescan'])->name('facescan');
    
    #ini profile
    Route::get('/profile', [App\Http\Controllers\profileController::class, 'index'])->name('profile');
    Route::post('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile');
});



