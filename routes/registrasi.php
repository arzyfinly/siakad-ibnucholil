<?php
Route::get('kirim', 'PendaftaranController@kirim')->name('kirim');
Route::group(['middleware' => ['web','roles']],function(){
    Route::group(['roles'=>['Pendaftar']],function(){
        Route::group([
            'prefix' => 'pendaftar',
        ], function(){
            Route::get('/', 'PendaftaranController@pendaftar_beranda')->name('pendaftar_beranda');
            Route::get('/form_password', 'PendaftaranController@form_password')->name('pendaftar_form_password');
            Route::post('/bukti_tf', 'PendaftaranController@bukti_tf')->name('pendaftar_bukti_tf');
        });
    });
});