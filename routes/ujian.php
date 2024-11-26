<?php
Route::group(['middleware' => ['web','roles']],function(){
    Route::group(['roles'=>['guru']],function(){
        Route::group([
            'prefix' => 'ujian','as' => 'ujian.',
        ], function(){
            Route::get('/cetak_nilai_ujian/{id}','UjianController@cetak_nilai_ujian')->name('cetak_nilai_ujian');
            Route::get('/data_ujian/{id}','UjianController@data_ujian')->name('data_ujian');
            Route::get('/json_ujian/{id}','UjianController@json_ujian')->name('json_ujian');
            Route::post('/input_ujian','UjianController@input_ujian')->name('input_ujian');
            Route::post('/update_ujian/{id}','UjianController@update_ujian')->name('update_ujian');
            Route::get('/delete_ujian/{id}','UjianController@delete_ujian')->name('delete_ujian');
            Route::get('/upload_nilai/{id}','UjianController@upload_nilai')->name('upload_nilai');
        });
    });
});
Route::group(['middleware' => ['web','roles']],function(){
    Route::group(['roles'=>['siswa','guru']],function(){
        Route::group([
            'prefix' => 'ujian','as' => 'ujian.',
        ], function(){
            Route::get('/data_ujian_siswa/{id}','UjianController@data_ujian_siswa')->name('data_ujian_siswa');
            Route::get('/json_ujian_siswa/{id}','UjianController@json_ujian_siswa')->name('json_ujian_siswa');
            Route::get('/data_nilai_ujian/{id}','UjianController@data_nilai_ujian')->name('data_nilai_ujian');
            Route::get('/json_nilai_ujian/{id}','UjianController@json_nilai_ujian')->name('json_nilai_ujian');
            Route::get('/data_nilai_ujian_siswa','UjianController@data_nilai_ujian_siswa')->name('data_nilai_ujian_siswa');
            Route::get('/json_nilai_ujian_siswa','UjianController@json_nilai_ujian_siswa')->name('json_nilai_ujian_siswa');
        });
    });
});