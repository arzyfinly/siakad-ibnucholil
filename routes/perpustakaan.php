<?php
Route::group(['middleware' => ['web','roles']],function(){
    Route::group(['roles'=>['Perpustakaan','Admin']],function(){
        Route::group([
            'prefix' => 'perpustakaan', 'as' => 'perpustakaan.',
        ], function(){
            Route::get('/', 'PerpustakaanController@index')->name('beranda');
            Route::get('/data_admin', 'PerpustakaanController@data_admin')->name('data_admin');
            Route::get('/json_admin', 'PerpustakaanController@json_admin')->name('json_admin');
            Route::post('/input_admin', 'PerpustakaanController@input_admin')->name('input_admin');
            Route::post('/update_admin/{id}', 'PerpustakaanController@update_admin')->name('update_admin');
            Route::get('/delete_admin/{id}', 'PerpustakaanController@delete_admin')->name('delete_admin');
        
            Route::get('/data_barang', 'PerpustakaanController@data_barang')->name('data_barang');
            Route::get('/json_barang', 'PerpustakaanController@json_barang')->name('json_barang');
            Route::post('/input_barang', 'PerpustakaanController@input_barang')->name('input_barang');
            Route::post('/update_barang/{id}', 'PerpustakaanController@update_barang')->name('update_barang');
            Route::get('/delete_barang/{id}', 'PerpustakaanController@delete_barang')->name('delete_barang');
            Route::get('/json_jurusan','AdminController@json_jurusan')->name('json_jurusan');

            Route::get('/data_buku', 'PerpustakaanController@data_buku')->name('data_buku');
            Route::get('/json_buku', 'PerpustakaanController@json_buku')->name('json_buku');
            Route::post('/input_buku', 'PerpustakaanController@input_buku')->name('input_buku');
            Route::post('/update_buku/{id}', 'PerpustakaanController@update_buku')->name('update_buku');
            Route::get('/delete_buku/{id}', 'PerpustakaanController@delete_buku')->name('delete_buku');

            Route::get('/data_pengunjung', 'PerpustakaanController@data_pengunjung')->name('data_pengunjung');
            Route::get('/json_pengunjung', 'PerpustakaanController@json_pengunjung')->name('json_pengunjung');
            Route::post('/input_pengunjung', 'PerpustakaanController@input_pengunjung')->name('input_pengunjung');
            Route::post('/update_pengunjung/{id}', 'PerpustakaanController@update_pengunjung')->name('update_pengunjung');
            Route::get('/delete_pengunjung/{id}', 'PerpustakaanController@delete_pengunjung')->name('delete_pengunjung');

            Route::get('/scan_user', 'PerpustakaanController@scan_user')->name('scan_user');
            Route::get('/scan_buku/{id}', 'PerpustakaanController@scan_buku')->name('scan_buku');
            Route::get('/json_peminjam_user/{id}', 'PerpustakaanController@json_peminjam_user')->name('json_peminjam_user');
            Route::get('/input_peminjam_user/{user}/{buku}', 'PerpustakaanController@input_peminjam_user')->name('input_peminjam_user');

            Route::get('/data_peminjam', 'PerpustakaanController@data_peminjam')->name('data_peminjam');
            Route::get('/json_peminjam', 'PerpustakaanController@json_peminjam')->name('json_peminjam');
            Route::post('/input_peminjam', 'PerpustakaanController@input_peminjam')->name('input_peminjam');
            Route::post('/update_peminjam/{id}', 'PerpustakaanController@update_peminjam')->name('update_peminjam');
            Route::post('/buku_kembali/{id}', 'PerpustakaanController@buku_kembali')->name('buku_kembali');
            Route::get('/delete_peminjam/{id}', 'PerpustakaanController@delete_peminjam')->name('delete_peminjam');

            Route::get('/data_denda', 'PerpustakaanController@data_denda')->name('data_denda');
            Route::get('/json_denda', 'PerpustakaanController@json_denda')->name('json_denda');
            Route::post('/input_denda', 'PerpustakaanController@input_denda')->name('input_denda');
            Route::post('/update_denda/{id}', 'PerpustakaanController@update_denda')->name('update_denda');
            Route::get('/delete_denda/{id}', 'PerpustakaanController@delete_denda')->name('delete_denda');
            
            Route::get('/pilih_cetak_idbuku', 'PerpustakaanController@pilih_cetak_idbuku')->name('pilih_cetak_idbuku');
            Route::get('/json_pilih_cetak_idbuku', 'PerpustakaanController@json_pilih_cetak_idbuku')->name('json_pilih_cetak_idbuku');
            Route::get('/cetak_all_idbuku', 'PerpustakaanController@cetak_all_idbuku')->name('cetak_all_idbuku');
            Route::post('/cetak_idbuku', 'PerpustakaanController@cetak_idbuku')->name('cetak_idbuku');
            Route::get('/cetak_buku', 'PerpustakaanController@cetak_buku')->name('cetak_buku');
        });
    });
});
