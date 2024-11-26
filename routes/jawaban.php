<?php
Route::group(['middleware' => ['web','roles']],function(){
    Route::group(['roles'=>['siswa']],function(){
        Route::group([
            'prefix' => 'jawaban','as' => 'jawaban.',
        ], function(){
            Route::get('/data_jawaban_siswa/{id}','JawabanController@data_jawaban_siswa')->name('data_jawaban_siswa');
            Route::get('/json_jawaban_siswa/{id}','JawabanController@json_jawaban_siswa')->name('json_jawaban_siswa');
            Route::get('/jawaban_ujian/{id}','JawabanController@jawaban_ujian')->name('jawaban_ujian');
            Route::post('/input_jawaban','JawabanController@input_jawaban')->name('input_jawaban');
        });
    });
});