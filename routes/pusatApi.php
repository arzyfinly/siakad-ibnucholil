<?php
        Route::group([
            'prefix' => 'api', 'as' => 'api.'
        ], function(){
            Route::get('/alluser', 'ApiController@alluser')->name('alluser');
            Route::get('/guru', 'ApiController@guru')->name('guru');
            Route::get('/siswa', 'ApiController@siswa')->name('siswa');
            Route::get('/allmapel', 'ApiController@allmapel')->name('allmapel');
            Route::get('/mapeljurusan', 'ApiController@mapeljurusan')->name('mapeljurusan');
            Route::get('/mapelkelas', 'ApiController@mapelkelas')->name('mapelkelas');
            Route::get('/mapelguru', 'ApiController@mapelguru')->name('mapelguru');
            Route::get('/allkelas', 'ApiController@allkelas')->name('allkelas');
            Route::get('/kelasjurusan', 'ApiController@kelasjurusan')->name('kelasjurusan');
            Route::get('/kelasguru', 'ApiController@kelasguru')->name('kelasguru');
            Route::get('/buku', 'ApiController@buku')->name('buku');
        });