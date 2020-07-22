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
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UserController');
Route::resource('penduduk', 'PendudukController');

Route::resource('/sasaran', 'SasaranController');
Route::resource('/jenisbantuan', 'JenisBantuanController');
Route::resource('/bantuan', 'BantuanController');
Route::resource('/penyuluhan', 'PenyuluhanController');

Route::resource('/dilaksanakan', 'KuotaController');
Route::resource('/tidak_dilaksanakan', 'BelumTerlaksanakanController');
