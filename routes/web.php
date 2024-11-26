<?php

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
Route::get('/pass', function () {
    return Hash::make('admin');
})->name('pass');
Route::get('/link', function () {
    Artisan::call('storage:link');
    }); //untuk membuat storage link
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/pass', function () {
    return Hash::make('admin');
})->name('pass');

Route::get('/daftar', function () {
    return view('registrasi');
});
Route::get('/', function () {
    return view('registrasi');
});
include('pusatApi.php');
include('admin.php');
include('registrasi.php');
include('siswa.php');
include('guru.php');
include('sarpras.php');
include('perpustakaan.php');
include('ujian.php');
include('soal.php');
include('jawaban.php');
include('pengawas.php');
Route::post('masuk', 'LoginController@masuk')->name('masuk');
Route::get('keluar', 'LoginController@keluar')->name('keluar');
Route::get('registrasi', 'PendaftaranController@index')->name('registrasi');
Route::post('daftar', 'PendaftaranController@store')->name('daftar');