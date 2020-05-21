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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/me', 'HomeController@me')->name('me');
    Route::post('/me/{id}', 'HomeController@profile_update')->name('profile_update');
    Route::get('password/', 'HomeController@password')->name('password');
    Route::post('password/{id}', 'HomeController@password_update')->name('password_update');
    Route::post('download/{id}', 'DownloadController@download')->name('download');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin');

    Route::post('siswa/import', 'SiswaController@import')->name('siswa.import');
    Route::post('guru/import', 'GuruController@import')->name('guru.import');
    Route::post('mapel/import', 'MataPelajaranController@import')->name('mapel.import');

    Route::resource('daftar_absensi', 'DaftarAbsensiController');
    Route::resource('siswa', 'SiswaController');
    Route::resource('guru', 'GuruController');
    Route::resource('jadwal_pelajaran', 'JadwalPelajaranController');
    Route::resource('jadwal_piket', 'JadwalPiketController');
    Route::resource('mata_pelajaran', 'MataPelajaranController');
    Route::resource('berkas', 'BerkasController');

    Route::group(['namespace' => 'Setting', 'prefix' => 'setting'], function () {
        Route::post('user/import', 'UserSettingController@import')->name('user.import');
        Route::resource('user_setting', 'UserSettingController');
    });
});

Route::group(['namespace' => 'Siswa', 'prefix' => 'siswa', 'middleware' => ['auth', 'role:siswa']], function () {
    Route::get('/', 'SiswaController@index')->name('siswa');
    Route::resource('absensi', 'AbsensiController');
    Route::get('list_guru', 'SiswaController@list_guru')->name('list_guru');
    Route::get('jadwal_pelajaran', 'SiswaController@jadwal_pelajaran')->name('jadwal_pelajaran');
    Route::get('jadwal_piket', 'SiswaController@jadwal_piket')->name('jadwal_piket');
    Route::get('mata_pelajaran', 'SiswaController@mata_pelajaran')->name('mata_pelajaran');
    Route::get('berkas', 'SiswaController@berkas')->name('berkas');
});
