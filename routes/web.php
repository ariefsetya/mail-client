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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile/{nama}', 'HomeController@profile');
Route::get('/sekolah', 'HomeController@sekolah');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//tambah ini
Route::get('/kelas','HomeController@all_kelas')->name('all_kelas');// tampilkan semua kelas
Route::get('/kelas/tambah','HomeController@tambah_kelas')->name('tambah_kelas');// tampilkan form input kelas
Route::post('/kelas/save','HomeController@save_kelas')->name('save_kelas'); // proses simpan kelas
Route::get('/kelas/edit/{id}','HomeController@edit_kelas')->name('edit_kelas'); // tampilkan form edit data kelas
Route::post('/kelas/update','HomeController@update_kelas')->name('update_kelas');// proses update kelas
Route::get('/kelas/delete/{id}','HomeController@delete_kelas')->name('delete_kelas'); // proses hapus data kelas

//tambah ini
Route::get('/jurusan','HomeController@all_jurusan')->name('all_jurusan');// tampilkan semua jurusan
Route::get('/jurusan/tambah','HomeController@tambah_jurusan')->name('tambah_jurusan');// tampilkan form input jurusan
Route::post('/jurusan/save','HomeController@save_jurusan')->name('save_jurusan'); // proses simpan jurusan
Route::get('/jurusan/edit/{id}','HomeController@edit_jurusan')->name('edit_jurusan'); // tampilkan form edit data jurusan
Route::post('/jurusan/update','HomeController@update_jurusan')->name('update_jurusan');// proses update jurusan
Route::get('/jurusan/delete/{id}','HomeController@delete_jurusan')->name('delete_jurusan'); // proses hapus data jurusan

Route::get('/ajax/get_jurusan','AjaxController@get_jurusan')->name('get_jurusan');
Route::get('/kelas_ajax','HomeController@kelas_ajax')->name('kelas_ajax');
Route::post('ajax/save_kelas','AjaxController@save_kelas')->name('save_kelas');

Route::get('/ajax/get_kelas','AjaxController@get_kelas')->name('get_kelas');

Route::post('/ajax/kirim_pesan','AjaxController@kirim_pesan')->name('kirim_pesan');

Route::get('/jurusan/pdf/{id}','HomeController@view_pdf_jurusan')->name('view_pdf_jurusan');
Route::get('/kelas/pdf/{id}','HomeController@view_pdf_kelas')->name('view_pdf_kelas');
Route::get('/jurusan/pdf/{id}/download','HomeController@download_pdf_jurusan')->name('download_pdf_jurusan');
Route::get('/kelas/pdf/{id}/download','HomeController@download_pdf_kelas')->name('download_pdf_kelas');

//menampilkan semua data kelas
Route::get('/kelas/pdf','HomeController@pdf_kelas')->name('pdf_kelas');

//route untuk email
Route::get('/messages','MessagesController@messages')->name('messages');
Route::get('/getMessage/{ids?}','MessagesController@getMessage')->name('getMessage');
