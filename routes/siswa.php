<?php
Route::group(['middleware' => ['web','roles']],function(){
    Route::get('/form_password','SiswaController@form_password')->name('form_password');
    Route::get('/form_password_siswa','SiswaController@form_password_siswa')->name('form_password_siswa');
    Route::post('/ganti_password/{id}','SiswaController@ganti_password')->name('ganti_password');
    Route::post('/update_password/{id}','AdminController@update_password')->name('update_password');
    Route::group(['roles'=>['Siswa','Admin']],function(){
        Route::group([
            'prefix' => 'siswa',
        ], function(){
        Route::get('/','SiswaController@index')->name('siswa');
        Route::get('/data_pribadi','SiswaController@data_pribadi')->name('data_pribadi');
        Route::get('/data_sekolah','SiswaController@data_sekolah')->name('data_sekolah');
        Route::get('/data_ayah','SiswaController@data_ayah')->name('data_ayah');
        Route::get('/data_ibu','SiswaController@data_ibu')->name('data_ibu');
        Route::get('/data_wali','SiswaController@data_wali')->name('data_wali');
        Route::get('/data_jurusan_siswa','SiswaController@data_jurusan_siswa')->name('data_jurusan_siswa');
        Route::post('/update_data_diri/{id}','SiswaController@update_data_diri')->name('update_data_diri');
        Route::post('/update_sekolah_asal/{id}','SiswaController@update_sekolah_asal')->name('update_sekolah_asal');
        Route::post('/update_ayah/{id}','SiswaController@update_ayah')->name('update_ayah');
        Route::post('/update_ibu/{id}','SiswaController@update_ibu')->name('update_ibu');
        Route::post('/update_wali/{id}','SiswaController@update_wali')->name('update_wali');
        Route::post('/update_surat/{id}','SiswaController@update_surat')->name('update_surat');
        Route::post('/update_pilihan_jurusan/{id}','SiswaController@update_pilihan_jurusan')->name('update_pilihan_jurusan');
        Route::post('/update_foto/{id}','SiswaController@update_foto')->name('update_foto');

        Route::get('/data_kelas','SiswaController@data_kelas')->name('siswa.data_kelas');
        Route::get('/json_kelas','SiswaController@json_kelas')->name('siswa.json_kelas');
        Route::get('/data_mapel/{id}/{semester}','SiswaController@data_mapel')->name('siswa.data_mapel');
        Route::get('/json_mapel/{id}/{semester}','SiswaController@json_mapel')->name('siswa.json_mapel');

        Route::get('/nilai_pengetahuan','SiswaController@nilai_pengetahuan')->name('siswa_nilai_pengetahuan');
        Route::get('/json_nilai_pengetahuan','SiswaController@json_nilai_pengetahuan')->name('siswa_json_nilai_pengetahuan');
        Route::get('/nilai_keterampilan','SiswaController@nilai_keterampilan')->name('siswa_nilai_keterampilan');
        Route::get('/json_nilai_keterampilan','SiswaController@json_nilai_keterampilan')->name('siswa_json_nilai_keterampilan');
        
        Route::get('/cetak_all_idcard','SiswaController@cetak_all_idcard')->name('siswa.cetak_all_idcard');
        Route::get('/cetak_idcard/{id}','SiswaController@cetak_idcard')->name('siswa.cetak_idcard');
        Route::get('/cetak_idcard_multi','SiswaController@cetak_idcard_multi')->name('siswa.cetak_idcard_multi');
        
        Route::get('/tahun_ajaran','GuruController@tahun_ajaran')->name('tahun_ajaran');

        Route::get('/data_skl_siswa','SiswaController@data_skl_siswa')->name('data_skl_siswa');
        });
    });
});