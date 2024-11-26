<?php
    Route::get('/ujian/{id}','PengawasController@ujian')->name('ujian');
    Route::get('/ujian_view','PengawasController@ujian_view')->name('ujian_view');
    Route::post('/cek_ujian','PengawasController@cek_ujian')->name('cek_ujian');
