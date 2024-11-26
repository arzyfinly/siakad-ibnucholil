<?php
Route::group(['middleware' => ['web','roles']],function(){
    Route::group(['roles'=>['Sarpras','Admin']],function(){
        Route::group([
            'prefix' => 'sarpras', 'as' => 'sarpras.',
        ], function(){
            Route::get('/', 'SarprasController@index')->name('sarpras');
            Route::get('/data_admin', 'SarprasController@data_admin')->name('data_admin');
            Route::get('/json_admin', 'SarprasController@json_admin')->name('json_admin');
            Route::post('/input_admin', 'SarprasController@input_admin')->name('input_admin');
            Route::post('/update_admin/{id}', 'SarprasController@update_admin')->name('update_admin');
            Route::get('/hapus_admin/{id}', 'SarprasController@hapus_admin')->name('hapus_admin');
        
            Route::get('/data_barang', 'SarprasController@data_barang')->name('data_barang');
            Route::get('/json_barang', 'SarprasController@json_barang')->name('json_barang');
            Route::post('/input_barang', 'SarprasController@input_barang')->name('input_barang');
            Route::post('/update_barang/{id}', 'SarprasController@update_barang')->name('update_barang');
            Route::get('/hapus_barang/{id}', 'SarprasController@hapus_barang')->name('hapus_barang');
            Route::get('/json_jurusan','AdminController@json_jurusan')->name('json_jurusan');
            
            Route::get('/data_perawatan/{id}', 'SarprasController@data_perawatan')->name('data_perawatan');
            Route::get('/json_perawatan/{id}', 'SarprasController@json_perawatan')->name('json_perawatan');
            Route::post('/input_perawatan', 'SarprasController@input_perawatan')->name('input_perawatan');
            Route::post('/update_perawatan/{id}', 'SarprasController@update_perawatan')->name('update_perawatan');
            Route::get('/hapus_perawatan/{id}', 'SarprasController@hapus_perawatan')->name('hapus_perawatan');

            Route::get('/data_ruang', 'SarprasController@data_ruang')->name('data_ruang');
            Route::get('/json_ruang', 'SarprasController@json_ruang')->name('json_ruang');
            Route::post('/input_ruang', 'SarprasController@input_ruang')->name('input_ruang');
            Route::post('/update_ruang/{id}', 'SarprasController@update_ruang')->name('update_ruang');
            Route::get('/hapus_ruang/{id}', 'SarprasController@hapus_ruang')->name('hapus_ruang');
        
            Route::get('/cetak_unit/{id}', 'SarprasController@cetak_unit')->name('cetak_unit');
            Route::get('/cetak_all_unit', 'SarprasController@cetak_all_unit')->name('cetak_all_unit');
            Route::get('/cetak_per_inputan/{ruangan}', 'SarprasController@cetak_per_inputan')->name('cetak_per_inputan');
            
            Route::get('/scan_qr_code', 'SarprasController@scan_qr_code')->name('scan_qr_code');
            Route::post('/cek_barang', 'SarprasController@cek_barang')->name('cek_barang');
            Route::get('/cetakqr/{id}', 'SarprasController@cetakqr')->name('cetakqr');
            
        });
    });
});