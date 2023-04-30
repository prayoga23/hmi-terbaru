<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPublikasiController;
use App\Http\Controllers\AdminKategoriPublikasiController;
use App\Http\Controllers\KategoriGaleriController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminGaleriController;
use App\KategoriPublikasi;
use App\KategoriBerita;
use App\KategoriGaleri;

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

Route::get('admin', 'HomeController@index')->name('home');

Route::get('admin/profile', 'ProfileController@index')->name('profile');
Route::put('admin/profile', 'ProfileController@update')->name('profile.update');

Route::resource('admin/galeri', 'AdminGaleriController', [
    'as' => 'admin'
]);

Route::resource('admin/berita', 'AdminBeritaController', [
    'as' => 'admin'
])->parameters([
    'berita' => 'berita'
]);
Route::resource('admin/kategori-publikasi', 'AdminKategoriPublikasiController', [
    'as' => 'admin'
]);
Route::resource('admin/kategori-berita', 'AdminKategoriBeritaController', [
    'as' => 'admin'
]);
Route::resource('admin/publikasi', 'AdminPublikasiController', [
    'as' => 'admin'
]);
Route::resource('admin/kategori-galeri', 'KategoriGaleriController', [
    'as' => 'admin'
]);
// Route::resource('tentangkami', 'AdminTentangKamiController', [
//     'as' => 'admin'
// ]);
Route::get('/about', function () {
    return view('about');
})->name('about');
// Tampilan Home
Route::get('/', 'IndexController@index')->name('index');
Route::get('tentangkami', 'TentangkamiController@index')->name('tentang kami');
Route::get('detail', 'DetailBlogController@index')->name('detail');
Route::get('publikasi', 'PublikasiController@index')->name('publikasi');
Route::get('publikasi/{slug}', 'PublikasiController@detail')->name('publikasi.detail');
Route::get('berita', 'BeritaController@index')->name('berita');
Route::get('berita/{slug}', 'BeritaController@detail')->name('berita.detail');
Route::get('galeri', 'GaleriController@index')->name('galeri');
// Route::get('/admin/publikasi/tambah', 'AdminPublikasiController@index');
// Route::get('/publikasi/edit/{id}', 'AdminPublikasiController@edit');
