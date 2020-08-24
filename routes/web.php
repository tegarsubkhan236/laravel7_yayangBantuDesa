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
    return view('landing-page');
});
// ['register' => false]
Auth::routes();

//cetak laporan
Route::get('/laporan_penyuluhan', 'PenyuluhanController@laporan_sorted');
Route::post('/laporan_penyuluhan_process', 'PenyuluhanController@laporan_sorted_process');

Route::get('/bantuan/cetak_pdf', 'BantuanController@cetak_pdf');
Route::get('/cetak_undangan/{id}', 'JenisBantuanController@cetak_undangan');
Route::get('/penyuluhan/cetak_pdf', 'PenyuluhanController@cetak_pdf');
Route::get('/penduduk/cari', 'PendudukController@cari');

Route::post('bantuan/store/admin', 'BantuanController@store_admin');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UserController');
Route::resource('penduduk', 'PendudukController');

Route::resource('/sasaran', 'SasaranController');
Route::resource('/pekerjaan', 'PekerjaanController');
Route::resource('/jenisbantuan', 'JenisBantuanController');
Route::resource('/bantuan', 'BantuanController');
Route::resource('/penyuluhan', 'PenyuluhanController');

Route::resource('/dilaksanakan', 'KuotaController');
Route::resource('/tidak_dilaksanakan', 'BelumTerlaksanakanController');
Route::resource('/lampiran', 'LampiranController');
