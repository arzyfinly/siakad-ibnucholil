<?php
Route::group(['middleware' => ['web','roles']],function(){
    Route::group(['roles'=>['Guru']],function(){
        Route::group([
            'prefix' => 'guru','as' => 'guru.',
        ], function(){
            Route::get('/', 'GuruController@index')->name('guru');

            Route::get('/form_update_guru','GuruController@form_update_guru')->name('form_update_guru');
            Route::post('/update_tentang_guru/{id}','GuruController@update_tentang_guru')->name('update_tentang_guru');
            Route::post('/update_pendidikan_guru/{id}','GuruController@update_pendidikan_guru')->name('update_pendidikan_guru');
            Route::post('/update_lain_guru/{id}','GuruController@update_lain_guru')->name('update_lain_guru');
            Route::post('/update_pegawai_guru/{id}','GuruController@update_pegawai_guru')->name('update_pegawai_guru');
            Route::post('/update_foto_guru/{id}','GuruController@update_foto_guru')->name('update_foto_guru');
            
            Route::get('/data_mapel/{tahun}/{semester}', 'GuruController@data_mapel')->name('data_mapel');
            Route::get('/data_mapel_ujian/{tahun}/{semester}', 'GuruController@data_mapel_ujian')->name('data_mapel_ujian');
            Route::get('/json_mapel/{tahun}/{semester}', 'GuruController@json_mapel')->name('json_mapel');
            Route::get('/json_mapel_ujian/{tahun}/{semester}', 'GuruController@json_mapel_ujian')->name('json_mapel_ujian');

            Route::get('/data_kd_pengetahuan/{id}','GuruController@data_kd_pengetahuan')->name('data_kd_pengetahuan');
            Route::get('/json_kd_pengetahuan/{id}','GuruController@json_kd_pengetahuan')->name('json_kd_pengetahuan');
            Route::get('/data_kd_keterampilan/{id}','GuruController@data_kd_keterampilan')->name('data_kd_keterampilan');
            Route::get('/json_kd_keterampilan/{id}','GuruController@json_kd_keterampilan')->name('json_kd_keterampilan');
            Route::post('/input_kd_mapel','GuruController@input_kd_mapel')->name('input_kd_mapel');
            Route::get('/export_kd_mapel/{id}','GuruController@export_kd_mapel')->name('guru.export_kd_mapel');
            Route::post('/import_kd_mapel','GuruController@import_kd_mapel')->name('import_kd_mapel');
            Route::post('/update_kd_mapel/{id}','GuruController@update_kd_mapel')->name('update_kd_mapel');
            Route::get('/hapus_kd_mapel/{id}','GuruController@hapus_kd_mapel')->name('hapus_kd_mapel');

            Route::get('/pilih_siswa/{id}','GuruController@pilih_siswa')->name('pilih_siswa');
            Route::get('/json_pilih_siswa','GuruController@json_pilih_siswa')->name('json_pilih_siswa');

            Route::get('/data_nilai_pengetahuan/{id}','GuruController@data_nilai_pengetahuan')->name('data_nilai_pengetahuan');
            Route::get('/data_siswa_pengetahuan/{id}','GuruController@data_siswa_pengetahuan')->name('data_siswa_pengetahuan');
            Route::get('/json_nilai_pengetahuan/{id}','GuruController@json_nilai_pengetahuan')->name('json_nilai_pengetahuan');
            Route::get('/json_siswa_pengetahuan/{id}','GuruController@json_siswa_pengetahuan')->name('json_siswa_pengetahuan');
            Route::post('/input_nilai_pengetahuan','GuruController@input_nilai_pengetahuan')->name('input_nilai_pengetahuan');
            Route::post('/import_pengetahuan','GuruController@import_pengetahuan')->name('import_pengetahuan');
            Route::get('/export_pengetahuan/{id}','GuruController@export_pengetahuan')->name('export_pengetahuan');

            Route::post('/update_nilai_tugas1/{id}','GuruController@update_nilai_tugas1')->name('update_nilai_tugas1');
            Route::post('/update_nilai_tugas2/{id}','GuruController@update_nilai_tugas2')->name('update_nilai_tugas2');
            Route::post('/update_nilai_tugas3/{id}','GuruController@update_nilai_tugas3')->name('update_nilai_tugas3');
            Route::post('/update_nilai_tugas4/{id}','GuruController@update_nilai_tugas4')->name('update_nilai_tugas4');
            Route::post('/update_nilai_tugas5/{id}','GuruController@update_nilai_tugas5')->name('update_nilai_tugas5');
            Route::post('/update_nilai_tugas6/{id}','GuruController@update_nilai_tugas6')->name('update_nilai_tugas6');
            Route::post('/update_nilai_uh1/{id}','GuruController@update_nilai_uh1')->name('update_nilai_uh1');
            Route::post('/update_nilai_uh2/{id}','GuruController@update_nilai_uh2')->name('update_nilai_uh2');
            Route::post('/update_nilai_uh3/{id}','GuruController@update_nilai_uh3')->name('update_nilai_uh3');
            Route::post('/update_nilai_uh4/{id}','GuruController@update_nilai_uh4')->name('update_nilai_uh4');
            Route::post('/update_nilai_uh5/{id}','GuruController@update_nilai_uh5')->name('update_nilai_uh5');
            Route::post('/update_nilai_uh6/{id}','GuruController@update_nilai_uh6')->name('update_nilai_uh6');
            Route::post('/update_nilai_uts/{id}','GuruController@update_nilai_uts')->name('update_nilai_uts');
            Route::post('/update_nilai_uas/{id}','GuruController@update_nilai_uas')->name('update_nilai_uas');
            Route::get('/hapus_nilai_pengetahuan/{id}','GuruController@hapus_nilai_pengetahuan')->name('hapus_nilai_pengetahuan');
            
            Route::get('/data_nilai_keterampilan/{id}','GuruController@data_nilai_keterampilan')->name('data_nilai_keterampilan');
            Route::get('/json_nilai_keterampilan/{id}','GuruController@json_nilai_keterampilan')->name('json_nilai_keterampilan');
            Route::get('/data_siswa_keterampilan/{id}','GuruController@data_siswa_keterampilan')->name('data_siswa_keterampilan');
            Route::get('/json_siswa_keterampilan/{id}','GuruController@json_siswa_keterampilan')->name('json_siswa_keterampilan');
            Route::post('/input_nilai_keterampilan','GuruController@input_nilai_keterampilan')->name('input_nilai_keterampilan');
            Route::post('/import_keterampilan','GuruController@import_keterampilan')->name('import_keterampilan');
            Route::get('/export_keterampilan/{id}','GuruController@export_keterampilan')->name('export_keterampilan');

            Route::post('/update_nilai_praktik1/{id}','GuruController@update_nilai_praktik1')->name('update_nilai_praktik1');
            Route::post('/update_nilai_praktik2/{id}','GuruController@update_nilai_praktik2')->name('update_nilai_praktik2');
            Route::post('/update_nilai_praktik3/{id}','GuruController@update_nilai_praktik3')->name('update_nilai_praktik3');
            Route::post('/update_nilai_praktik4/{id}','GuruController@update_nilai_praktik4')->name('update_nilai_praktik4');
            Route::post('/update_nilai_praktik5/{id}','GuruController@update_nilai_praktik5')->name('update_nilai_praktik5');
            Route::post('/update_nilai_praktik6/{id}','GuruController@update_nilai_praktik6')->name('update_nilai_praktik6');
            Route::post('/update_nilai_portofolio1/{id}','GuruController@update_nilai_portofolio1')->name('update_nilai_portofolio1');
            Route::post('/update_nilai_portofolio2/{id}','GuruController@update_nilai_portofolio2')->name('update_nilai_portofolio2');
            Route::post('/update_nilai_portofolio3/{id}','GuruController@update_nilai_portofolio3')->name('update_nilai_portofolio3');
            Route::post('/update_nilai_portofolio4/{id}','GuruController@update_nilai_portofolio4')->name('update_nilai_portofolio4');
            Route::post('/update_nilai_portofolio5/{id}','GuruController@update_nilai_portofolio5')->name('update_nilai_portofolio5');
            Route::post('/update_nilai_portofolio6/{id}','GuruController@update_nilai_portofolio6')->name('update_nilai_portofolio6');
            Route::post('/update_nilai_proyek1/{id}','GuruController@update_nilai_proyek1')->name('update_nilai_proyek1');
            Route::post('/update_nilai_proyek2/{id}','GuruController@update_nilai_proyek2')->name('update_nilai_proyek2');
            Route::post('/update_nilai_proyek3/{id}','GuruController@update_nilai_proyek3')->name('update_nilai_proyek3');
            Route::post('/update_nilai_proyek4/{id}','GuruController@update_nilai_proyek4')->name('update_nilai_proyek4');
            Route::post('/update_nilai_proyek5/{id}','GuruController@update_nilai_proyek5')->name('update_nilai_proyek5');
            Route::post('/update_nilai_proyek6/{id}','GuruController@update_nilai_proyek6')->name('update_nilai_proyek6');

            Route::get('/data_nilai_sikap/{id}','GuruController@data_nilai_sikap')->name('data_nilai_sikap');
            Route::get('/json_nilai_sikap/{id}','GuruController@json_nilai_sikap')->name('json_nilai_sikap');
            Route::get('/data_siswa_sikap/{id}','GuruController@data_siswa_sikap')->name('data_siswa_sikap');
            Route::get('/json_siswa_sikap/{id}','GuruController@json_siswa_sikap')->name('json_siswa_sikap');
            Route::post('/input_nilai_sikap','GuruController@input_nilai_sikap')->name('input_nilai_sikap');
            Route::post('/import_sikap','GuruController@import_sikap')->name('import_sikap');
            Route::get('/export_sikap/{id}','GuruController@export_sikap')->name('export_sikap');

            Route::post('/update_nilai_sikap/{id}','GuruController@update_nilai_sikap')->name('update_nilai_sikap');
            Route::post('/update_nilai_deskripsi/{id}','GuruController@update_nilai_deskripsi')->name('update_nilai_deskripsi');
            Route::post('/update_nilai_alpha/{id}','GuruController@update_nilai_alpha')->name('update_nilai_alpha');
            Route::post('/update_nilai_izin/{id}','GuruController@update_nilai_izin')->name('update_nilai_izin');
            Route::post('/update_nilai_sakit/{id}','GuruController@update_nilai_sakit')->name('update_nilai_sakit');

            Route::get('/cetak_nilai_pengetahuan/{id}','GuruController@cetak_nilai_pengetahuan')->name('cetak_nilai_pengetahuan');
            Route::get('/cetak_nilai_keterampilan/{id}','GuruController@cetak_nilai_keterampilan')->name('cetak_nilai_keterampilan');
            Route::get('/cetak_nilai_sikap/{id}','GuruController@cetak_nilai_sikap')->name('cetak_nilai_sikap');
           
            Route::get('/data_kelas','GuruController@data_kelas')->name('data_kelas');
            Route::get('/json_kelas','GuruController@json_kelas')->name('json_kelas');
        
            Route::get('/pilih_siswa/{id}','GuruController@pilih_siswa')->name('pilih_siswa');
            Route::get('/json_pilih_siswa','GuruController@json_pilih_siswa')->name('json_pilih_siswa');
            Route::get('/data_krs/{id}/{semester}','GuruController@data_krs')->name('data_krs');
            Route::get('/json_krs/{id}/{semester}','GuruController@json_krs')->name('json_krs');
            Route::post('/input_krs','GuruController@input_krs')->name('input_krs');
            Route::post('/update_krs/{id}','GuruController@update_krs')->name('update_krs');
            Route::get('/hapus_krs/{id}','GuruController@hapus_krs')->name('hapus_krs');

            Route::get('/data_prakerin/{id}','GuruController@data_prakerin')->name('data_prakerin');
            Route::get('/json_prakerin/{id}','GuruController@json_prakerin')->name('json_prakerin');
            Route::post('/input_prakerin','GuruController@input_prakerin')->name('input_prakerin');
            Route::post('/update_prakerin/{id}','GuruController@update_prakerin')->name('update_prakerin');
            Route::get('/hapus_prakerin/{id}','GuruController@hapus_prakerin')->name('hapus_prakerin');
    
            Route::get('/data_eskul/{id}','GuruController@data_eskul')->name('data_eskul');
            Route::get('/json_eskul/{id}','GuruController@json_eskul')->name('json_eskul');
            Route::post('/input_eskul','GuruController@input_eskul')->name('input_eskul');
            Route::post('/update_eskul/{id}','GuruController@update_eskul')->name('update_eskul');
            Route::get('/hapus_eskul/{id}','GuruController@hapus_eskul')->name('hapus_eskul');
    
            Route::get('/data_prestasi/{id}','GuruController@data_prestasi')->name('data_prestasi');
            Route::get('/json_prestasi/{id}','GuruController@json_prestasi')->name('json_prestasi');
            Route::post('/input_prestasi','GuruController@input_prestasi')->name('input_prestasi');
            Route::post('/update_prestasi/{id}','GuruController@update_prestasi')->name('update_prestasi');
            Route::get('/hapus_prestasi/{id}','GuruController@hapus_prestasi')->name('hapus_prestasi');
    
            Route::get('/data_absen/{id}','GuruController@data_absen')->name('data_absen');
            Route::get('/json_absen/{id}','GuruController@json_absen')->name('json_absen');
            Route::post('/input_absen','GuruController@input_absen')->name('input_absen');
            Route::post('/update_absen/{id}','GuruController@update_absen')->name('update_absen');
            Route::get('/hapus_absen/{id}','GuruController@hapus_absen')->name('hapus_absen');
    
            Route::get('/data_catatan/{id}','GuruController@data_catatan')->name('data_catatan');
            Route::get('/json_catatan/{id}','GuruController@json_catatan')->name('json_catatan');
            Route::post('/input_catatan','GuruController@input_catatan')->name('input_catatan');
            Route::post('/update_catatan/{id}','GuruController@update_catatan')->name('update_catatan');
            Route::get('/hapus_catatan/{id}','GuruController@hapus_catatan')->name('hapus_catatan');
    
            Route::get('/cetak_sampul/{id}','GuruController@cetak_sampul')->name('cetak_sampul');
            Route::get('/cetak_data_sekolah/{id}','GuruController@cetak_data_sekolah')->name('cetak_data_sekolah');
            Route::get('/cetak_petunjuk/{id}','GuruController@cetak_petunjuk')->name('cetak_petunjuk');
            Route::get('/cetak_data_diri/{id}','GuruController@cetak_data_diri')->name('cetak_data_diri');
            Route::get('/cetak_raport/{id}','GuruController@cetak_raport')->name('cetak_raport');
            Route::get('/cetak_deskripsi/{id}','GuruController@cetak_deskripsi')->name('cetak_deskripsi');
            Route::get('/cetak_deskripsi/{id}/date/{date}','GuruController@cetak_deskripsi_date')->name('cetak_deskripsi_date');
            Route::get('/cetak_all/{id}','GuruController@cetak_all')->name('cetak_all');
            
            // Turunan Guru
            Route::get('/tahun_ajaran','GuruController@tahun_ajaran')->name('tahun_ajaran');
            Route::get('/data_tahun_ajaran','GuruController@data_tahun_ajaran')->name('data_tahun_ajaran');
            Route::get('/form_update_tahun_ajaran/{id}','GuruController@form_update_tahun_ajaran')->name('form_update_tahun_ajaran');
            Route::get('/json_tahun_ajaran/{id}','GuruController@json_tahun_ajaran')->name('json_tahun_ajaran');
            Route::get('/json_tahun_ajaran_ujian/{id}','GuruController@json_tahun_ajaran_ujian')->name('json_tahun_ajaran_ujian');
            Route::post('/input_tahun_ajaran','GuruController@input_tahun_ajaran')->name('input_tahun_ajaran');
            Route::post('/update_tahun_ajaran/{id}','GuruController@update_tahun_ajaran')->name('update_tahun_ajaran');
            Route::get('/hapus_tahun_ajaran/{id}','GuruController@hapus_tahun_ajaran')->name('hapus_tahun_ajaran');

            // Ujian
            Route::get('/data_ujian/{id}','GuruController@data_ujian')->name('data_ujian');
            
        });

    });
});