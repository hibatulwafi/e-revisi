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
Route::get('/', function () {
	return view('landingpage');
    //return view('terminated', ['name' => 'Harus Login Dahulu']);
});

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth','checkRole:mahasiswa']],function(){    
    Route::get('/mahasiswa','DashboardController@mahasiswa')->name('mahasiswa.dashboard');
    Route::get('/mahasiswa/revisiku','RevisiController@revisiku')->name('mahasiswa.revisiku');
    Route::get('/mahasiswa/revisiku/detail/{id}','RevisiController@revisikudetail')->name('mahasiswa.revisiku.detail');
	Route::post('/upload/proses', 'UploadController@proses_upload')->name('upload');
	Route::get('/mahasiswa/cetak', 'CetakController@index')->name('mahasiswa.cetak');
	Route::get('/cetak', 'CetakController@cetak')->name('cetak');

});

Route::group(['middleware' => ['auth','checkRole:dosen']],function(){    
    Route::get('/dosen','DashboardController@dosen')->name('dosen.dashboard');
    Route::get('/dosen/revisibaru','RevisiController@revisibaru')->name('dosen.revisibaru');
    Route::get('/dosen/revisibaru/create/{id}','RevisiController@revisitambah')->name('dosen.revisibaru.tambah');
	Route::get('/dosen/datarevisi','RevisiController@datarevisi')->name('dosen.datarevisi');
	Route::get('/dosen/detaildatarevisi/{id}','RevisiController@detaildatarevisi')->name('dosen.detaildatarevisi');
	Route::get('/dosen/filedatarevisi/{id}','RevisiController@filedatarevisi')->name('dosen.filedatarevisi');
	Route::post('/dosen/acc','RevisiController@acc')->name('acc');
	Route::get('/dosen/accfile/{id}','RevisiController@accfile')->name('dosen.accfile');
	Route::get('/dosen/rejectfile/{id}','RevisiController@rejectfile')->name('dosen.rejectfile');


});


Route::group(['middleware' => ['auth','checkRole:admin']],function(){    
    Route::get('/admin','DashboardController@admin')->name('admin.dashboard');
	Route::get('/admin/kelas','kelasController@index')->name('admin.kelas');
	Route::get('/admin/kelas/create','kelasController@create')->name('admin.kelas.create');
	Route::post('/admin/kelas/store','kelasController@store')->name('admin.kelas.store');
	Route::get('/admin/kelas/edit/{id}','kelasController@edit')->name('admin.kelas.edit');
	Route::post('/admin/kelas/update/{id}','kelasController@update')->name('admin.kelas.update');
	Route::get('/admin/kelas/delete/{id}','kelasController@delete')->name('admin.kelas.delete');

	Route::get('/admin/mahasiswa','MahasiswaController@index')->name('admin.mahasiswa');
	Route::get('/admin/mahasiswa/create','MahasiswaController@create')->name('admin.mahasiswa.create');
	Route::post('/admin/mahasiswa/store','MahasiswaController@store')->name('admin.mahasiswa.store');
	Route::get('/admin/mahasiswa/edit/{id}','MahasiswaController@edit')->name('admin.mahasiswa.edit');
	Route::post('/admin/mahasiswa/update/{id}','MahasiswaController@update')->name('admin.mahasiswa.update');
	Route::get('/admin/mahasiswa/delete/{id}','MahasiswaController@delete')->name('admin.mahasiswa.delete');

	Route::get('/admin/dosen','DosenController@index')->name('admin.dosen');
	Route::get('/admin/dosen/create','DosenController@create')->name('admin.dosen.create');
	Route::post('/admin/dosen/store','DosenController@store')->name('admin.dosen.store');
	Route::get('/admin/dosen/edit/{id}','DosenController@edit')->name('admin.dosen.edit');
	Route::post('/admin/dosen/update/{id}','DosenController@update')->name('admin.dosen.update');
	Route::get('/admin/dosen/delete/{id}','DosenController@delete')->name('admin.dosen.delete');

	Route::get('/admin/jurusan','JurusanController@index')->name('admin.jurusan');
	Route::get('/admin/jurusan/create','JurusanController@create')->name('admin.jurusan.create');
	Route::post('/admin/jurusan/store','JurusanController@store')->name('admin.jurusan.store');
	Route::get('/admin/jurusan/edit/{id}','JurusanController@edit')->name('admin.jurusan.edit');
	Route::post('/admin/jurusan/update/{id}','JurusanController@update')->name('admin.jurusan.update');
	Route::get('/admin/jurusan/delete/{id}','JurusanController@delete')->name('admin.jurusan.delete');

	Route::get('/admin/revisi','RevisiController@index')->name('admin.revisi');
	Route::get('/admin/revisi/create','RevisiController@create')->name('admin.revisi.create');
	Route::post('/admin/revisi/store','RevisiController@store')->name('admin.revisi.store');
	Route::get('/admin/revisi/edit/{id}','RevisiController@edit')->name('admin.revisi.edit');
	Route::post('/admin/revisi/update/{id}','RevisiController@update')->name('admin.revisi.update');
	Route::get('/admin/revisi/delete/{id}','RevisiController@delete')->name('admin.revisi.delete');


	Route::get('/admin/datapenguji','PengujiController@index')->name('admin.datapenguji');
	Route::get('/admin/datapenguji/create','PengujiController@create')->name('admin.datapenguji.create');
	Route::post('/admin/datapenguji/store','PengujiController@store')->name('admin.datapenguji.store');

});
