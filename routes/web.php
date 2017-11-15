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
Route::group(['prefix' => 'admin'], function() {
	Route::get('/', function() {
		return view('admin.layouts.login');
	})->name('login');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['login']], function() {

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	Route::prefix('kategori')->group(function() {
		Route::get('/', 'KategoriController@index')->name('kategori');
		Route::post('store', 'KategoriController@store')->name('kategori-store');
		Route::get('edit/{id}', 'KategoriController@edit')->name('kategori-edit');
		Route::post('update/{id}', 'KategoriController@update')->name('kategori-update');
		Route::get('destroy/{id}', 'KategoriController@destroy')->name('kategori-destroy');
	});

	Route::prefix('tag')->group(function() {
		Route::get('/', 'TagController@index')->name('tag');
		Route::post('store', 'TagController@store')->name('tag-store');
		Route::get('edit/{tag}', 'TagController@edit')->name('tag-edit');
		Route::post('update/{tag}', 'TagController@update')->name('tag-update');
		Route::get('destroy/{tag}', 'TagController@destroy')->name('tag-destroy');
	});

	Route::prefix('grup')->group(function() {
		Route::get('/', 'GrupController@index')->name('grup');
		Route::get('create', 'GrupController@create')->name('grup-create');
		Route::post('store', 'GrupController@store')->name('grup-store');
		Route::get('edit/{grup}', 'GrupController@edit')->name('grup-edit');
		Route::post('update/{grup}', 'GrupController@update')->name('grup-update');
		Route::get('destroy/{grup}', 'GrupController@destroy')->name('grup-destroy');
	});

	Route::prefix('user')->group(function() {
		Route::get('/', 'UserController@index')->name('user');
		Route::get('create', 'UserController@create')->name('user-create');
		Route::post('store', 'UserController@store')->name('user-store');
		Route::get('edit/{user}', 'UserController@edit')->name('user-edit');
		Route::post('update/{user}', 'UserController@update')->name('user-update');
		Route::get('destroy/{user}', 'UserController@destroy')->name('user-destroy');
	});

	Route::prefix('media')->group(function() {
		Route::get('/', 'MediaController@index')->name('media');
	});

	Route::prefix('komentar')->group(function() {
		Route::get('/{status?}', 'KomentarController@index')->name('komentar');
		Route::post('reply/{komentar}', 'KomentarController@reply')->name('komentar-reply');
		Route::get('destroy/{komentar}', 'KomentarController@destroy')->name('komentar-destroy');
		Route::get('approve/{komentar}', 'KomentarController@approve')->name('komentar-approve');
		Route::get('cancel-approve/{komentar}', 'KomentarController@cancelApprove')->name('komentar-cancel_approve');
	});

	Route::prefix('post')->group(function() {
		Route::get('/', 'PostController@index')->name('post');
		Route::get('create', 'PostController@create')->name('post-create');
		Route::post('store', 'PostController@store')->name('post-store');
		Route::get('edit/{id}', 'PostController@edit')->name('post-edit');
		Route::post('update/{id}', 'PostController@update')->name('post-update');
		Route::get('delete/{id}', 'PostController@delete')->name('post-delete');
		Route::get('draft/{id}', 'PostController@draft')->name('post-draft');
		Route::get('publish/{id}', 'PostController@publish')->name('post-publish');
	});

	Route::prefix('halaman')->group(function() {
		Route::get('/', 'HalamanController@index')->name('halaman');
	});

	Route::prefix('menu')->group(function() {
		Route::get('/', 'MenuController@index')->name('menu');
		Route::post('/', 'MenuController@store')->name('menu-store');
		Route::get('edit/{menu}', 'MenuController@edit')->name('menu-edit');
		Route::post('update/{menu}', 'MenuController@update')->name('menu-update');
		Route::get('destroy/{menu}', 'MenuController@destroy')->name('menu-destroy');
	});

	Route::prefix('daftar-menu')->group(function() {
		Route::get('/', 'DaftarMenuController@index')->name('daftarMenu');
		Route::post('/', 'DaftarMenuController@store')->name('daftarMenu-store');
		Route::get('/edit/{daftarMenu}', 'DaftarMenuController@edit')->name('daftarMenu-edit');
		Route::post('/update/{daftarMenu}', 'DaftarMenuController@update')->name('daftarMenu-update');
		Route::get('/destroy/{daftarMenu}', 'DaftarMenuController@destroy')->name('daftarMenu-destroy');
	});

	Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['namespace' => 'User'], function() {

	Route::get('/', 'HomeController@index')->name('home');
	Route::post('/tanggapan-post', 'HomeController@storeTanggapan')->name('tanggapan-store');

	Route::prefix('album')->group(function() {
		Route::get('/', 'GaleriController@index')->name('album');
		Route::get('{slug}', 'GaleriController@detail')->name('album-detail');
	});

	Route::prefix('tag')->group(function() {
		Route::get('{tag}', 'TagController@index')->name('find-tag');
	});

	Route::prefix('kategori')->group(function() {
		Route::get('{kategori}', 'KategoriController@index')->name('find-kategori');
	});

	Route::prefix('berita')->group(function() {
		Route::get('/', 'AllWithPaggingController@index')->name('berita');
		Route::get('{tahun}/{bulan}', 'ArsipController@index')->name('berita-arsip');
		Route::get('{slug?}', 'ArsipController@detail')->name('berita-detail');
	});

	Route::prefix('kegiatan')->group(function() {
		Route::get('/', 'AllWithPaggingController@index')->name('kegiatan');
		Route::get('{tahun}/{bulan}', 'ArsipController@index')->name('kegiatan-arsip');
		Route::get('{slug?}', 'ArsipController@detail')->name('kegiatan-detail');
	});

	Route::prefix('pengaduan')->group(function() {
		Route::get('/', 'ComplainController@index')->name('pengaduan');
	});	

	Route::get('/{slug}', 'PageController@index')->name('pages');

});

Auth::routes();
