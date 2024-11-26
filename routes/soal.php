<?php
Route::group(['middleware' => ['web','roles']],function(){
    Route::group(['roles'=>['guru']],function(){
        Route::group([
            'prefix' => 'soal','as' => 'soal.',
        ], function(){
            Route::get('/data_soal/{id}','SoalController@data_soal')->name('data_soal');
            Route::get('/json_soal/{id}','SoalController@json_soal')->name('json_soal');
            Route::post('/input_soal','SoalController@input_soal')->name('input_soal');
            Route::post('/import_soal','SoalController@import_soal')->name('import_soal');
            Route::post('/update_soal/{id}','SoalController@update_soal')->name('update_soal');
            Route::get('/delete_soal/{id}','SoalController@delete_soal')->name('delete_soal');
            Route::get('/delete_soalbyujian/{id}','SoalController@delete_soalbyujian')->name('delete_soalbyujian');
        });
    });
});
Route::group(['middleware' => ['web','roles']],function(){
    Route::group(['roles'=>['siswa']],function(){
        Route::group([
            'prefix' => 'soal','as' => 'soal.',
        ], function(){
            Route::get('/data_soal_siswa/{id}','SoalController@data_soal_siswa')->name('data_soal_siswa');
            Route::get('/json_soal_siswa/{id}','SoalController@json_soal_siswa')->name('json_soal_siswa');
            Route::get('/soal_ujian/{id}','SoalController@soal_ujian')->name('soal_ujian');
            Route::get('/selesai_ujian/{ujian}/{siswa}/{mulai}','SoalController@selesai_ujian')->name('selesai_ujian');
        });
    });
});