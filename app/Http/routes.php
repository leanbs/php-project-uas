<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');
Route::get('home', 'PagesController@home');

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

/** Registration routes */
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

/** Questions routes */
Route::group(['prefix' => 'question'], function(){
	Route::get('posts', 'ForumController@getPost');
	Route::post('posts', 'ForumController@postQuestion');
	Route::delete('posts', 'ForumController@deleteQuestion');
	Route::get('{slug}', 'ForumController@viewPost');
	Route::post('reply', 'ForumController@saveReply');
	Route::delete('reply', 'ForumController@deleteReply');
});

/** Handle Category routes */
Route::get('category', 'CategoryController@manage');
Route::get('modalTambahCategory', 'CategoryController@getModalTambahCategory');
Route::post('modalTambahCategory', 'CategoryController@postModalTambahCategory');
Route::get('modalUbahCategory/{id}', 'CategoryController@getModalUbahCategory');
Route::post('modalUbahCategory', 'CategoryController@postModalUbahCategory');
Route::get('modalHapusCategory/{id}', 'CategoryController@getModalHapusCategory');
Route::post('modalHapusCategory', 'CategoryController@postModalHapusCategory');

/** Handle Anggota routes */
Route::get('daftar_anggota', 'DaftarAnggotaController@manage');
Route::get('modalTambahAnggota', 'DaftarAnggotaController@getModalTambahAnggota');
Route::post('modalTambahAnggota', 'DaftarAnggotaController@postModalTambahAnggota');
Route::get('modalUbahAnggota/{id}', 'DaftarAnggotaController@getModalUbahAnggota');
Route::post('modalUbahAnggota', 'DaftarAnggotaController@postModalUbahAnggota');
Route::get('modalHapusAnggota/{id}', 'DaftarAnggotaController@getModalHapusAnggota');
Route::post('modalHapusAnggota', 'DaftarAnggotaController@postModalHapusAnggota');

/** Handle keuangan routes */
Route::get('laporan_keuangan', 'LaporanKeuanganController@manage');
Route::get('modalTambahKeuangan', 'LaporanKeuanganController@getModalTambahKeuangan');
Route::post('modalTambahKeuangan', 'LaporanKeuanganController@postModalTambahKeuangan');
Route::get('modalUbahKeuangan/{id}', 'LaporanKeuanganController@getModalUbahKeuangan');
Route::post('modalUbahKeuangan', 'LaporanKeuanganController@postModalUbahKeuangan');
Route::get('modalHapusKeuangan/{id}', 'LaporanKeuanganController@getModalHapusKeuangan');
Route::post('modalHapusKeuangan', 'LaporanKeuanganController@postModalHapusKeuangan');


/** Handle Anggota routes */
Route::get('informasi_kegiatan', 'InformasiKegiatanController@manage');
Route::get('modalTambahKegiatan', 'InformasiKegiatanController@getModalTambahKegiatan');
Route::post('modalTambahKegiatan', 'InformasiKegiatanController@postModalTambahKegiatan');
Route::get('modalUbahKegiatan/{id}', 'InformasiKegiatanController@getModalUbahKegiatan');
Route::post('modalUbahKegiatan', 'InformasiKegiatanController@postModalUbahKegiatan');
Route::get('modalHapusKegiatan/{id}', 'InformasiKegiatanController@getModalHapusKegiatan');
Route::post('modalHapusKegiatan', 'InformasiKegiatanController@postModalHapusKegiatan');

/** Handle Pengurus Punguan routes */
Route::get('pengurus_punguan', 'PengurusPunguanController@manage');


