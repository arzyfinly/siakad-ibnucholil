<?php
Route::group(['middleware' => ['web','roles']],function(){
    Route::group(['roles'=>['Admin','Guru']],function(){
        Route::group([
            'prefix' => 'admin',
        ], function(){
        Route::get('/','AdminController@index')->name('admin');
        Route::get('/data_siswa','AdminController@data_siswa')->name('data_siswa');
        Route::get('/data_pendaftar','AdminController@data_pendaftar')->name('data_pendaftar');
        Route::get('/data_unverified','AdminController@data_unverified')->name('data_unverified');
        Route::get('/data_verified','AdminController@data_verified')->name('data_verified');
        Route::get('/form_update_siswa/{id}','AdminController@form_update_siswa')->name('form_update_siswa');
        Route::post('/update_data_diri/{id}','AdminController@update_data_diri')->name('admin_update_data_diri');
        Route::post('/update_sekolah_asal/{id}','AdminController@update_sekolah_asal')->name('admin_update_sekolah_asal');
        Route::post('/update_data_lulusan/{id}','AdminController@update_data_lulusan')->name('admin_update_data_lulusan');
        Route::post('/update_ayah/{id}','AdminController@update_ayah')->name('admin_update_ayah');
        Route::post('/update_ibu/{id}','AdminController@update_ibu')->name('admin_update_ibu');
        Route::post('/update_wali/{id}','AdminController@update_wali')->name('admin_update_wali');
        Route::post('/update_surat/{id}','AdminController@update_surat')->name('admin_update_surat');
        Route::post('/update_pilihan_jurusan/{id}','AdminController@update_pilihan_jurusan')->name('admin_update_pilihan_jurusan');
        Route::post('/update_foto/{id}','AdminController@update_foto')->name('admin_update_foto');
        Route::get('/json_siswa','AdminController@json_siswa')->name('json_siswa');
        Route::get('/json_pendaftar','AdminController@json_pendaftar')->name('json_pendaftar');
        Route::get('/json_unverified','AdminController@json_unverified')->name('json_unverified');
        Route::get('/json_verified','AdminController@json_verified')->name('json_verified');
        Route::post('/export_siswa','AdminController@export_siswa')->name('export_siswa');
        Route::post('/import_siswa','AdminController@import_siswa')->name('import_siswa');
        Route::get('/hapus_user/{id}','AdminController@hapus_user')->name('hapus_user');
        Route::get('/hapus_guru/{id}','AdminController@hapus_guru')->name('hapus_guru');
        Route::get('/hapus_bukti_tf/{id}','AdminController@hapus_bukti_tf')->name('hapus_bukti_tf');
        Route::get('/verifikasi_user/{id}','AdminController@verifikasi_user')->name('verifikasi_user');
        Route::get('/unverifikasi_user/{id}','AdminController@unverifikasi_user')->name('unverifikasi_user');
        Route::get('/buku_besar','AdminController@buku_besar')->name('buku_besar');
        Route::get('/buku_besar_siswa/{id}','AdminController@buku_besar_siswa')->name('buku_besar_siswa');
        Route::post('/cetak_pilihan_idcard','AdminController@cetak_pilihan_idcard')->name('cetak_pilihan_idcard');
        Route::post('/buku_besar_tahunan','AdminController@buku_besar_tahunan')->name('buku_besar_tahunan');
        Route::get('/download/skl/{id}','AdminController@download_skl')->name('download_skl');

        Route::get('/hapus_admin/{id}', 'SarprasController@hapus_admin')->name('hapus_admin');
        Route::get('/hapus_barang/{id}', 'SarprasController@hapus_barang')->name('hapus_barang');
        Route::get('/hapus_perawatan/{id}', 'SarprasController@hapus_perawatan')->name('hapus_perawatan');
        Route::get('/hapus_ruang/{id}', 'SarprasController@hapus_ruang')->name('hapus_ruang');

        Route::get('/delete_admin/{id}', 'PerpustakaanController@delete_admin')->name('delete_admin');
        Route::get('/delete_barang/{id}', 'PerpustakaanController@delete_barang')->name('delete_barang');
        Route::get('/delete_buku/{id}', 'PerpustakaanController@delete_buku')->name('delete_buku');
        Route::get('/delete_pengunjung/{id}', 'PerpustakaanController@delete_pengunjung')->name('delete_pengunjung');
        Route::get('/delete_peminjam/{id}', 'PerpustakaanController@delete_peminjam')->name('delete_peminjam');
        Route::get('/delete_denda/{id}', 'PerpustakaanController@delete_denda')->name('delete_denda');

        Route::get('/data_guru','AdminController@data_guru')->name('data_guru');
        Route::get('/form_tambah_guru','AdminController@form_tambah_guru')->name('form_tambah_guru');
        Route::post('/tambah_guru','AdminController@tambah_guru')->name('tambah_guru');
        Route::get('/form_update_guru/{id}','AdminController@form_update_guru')->name('form_update_guru');
        Route::post('/update_tentang_guru/{id}','AdminController@update_tentang_guru')->name('admin_update_tentang_guru');
        Route::post('/update_pendidikan_guru/{id}','AdminController@update_pendidikan_guru')->name('admin_update_pendidikan_guru');
        Route::post('/update_lain_guru/{id}','AdminController@update_lain_guru')->name('admin_update_lain_guru');
        Route::post('/update_pegawai_guru/{id}','AdminController@update_pegawai_guru')->name('admin_update_pegawai_guru');
        Route::post('/update_foto_guru/{id}','AdminController@update_foto_guru')->name('admin_update_foto_guru');
        Route::post('/update_password_guru/{id}','AdminController@update_password_guru')->name('admin_update_password_guru');
        Route::get('/json_guru','AdminController@json_guru')->name('json_guru');
        Route::get('/json_user_as_guru','AdminController@json_user_as_guru')->name('json_user_as_guru');
        Route::post('/input_guru','AdminController@input_guru')->name('input_guru');
        Route::post('/import_guru','AdminController@import_guru')->name('import_guru');
        Route::get('/export_guru','AdminController@export_guru')->name('export_guru');
        Route::get('/cetak_buku_induk_guru','AdminController@cetak_buku_induk_guru')->name('cetak_buku_induk_guru');
        Route::get('/cetak_idcard_guru/{id}','AdminController@cetak_idcard_guru')->name('cetak_idcard_guru');
        
        Route::get('/data_jurusan','AdminController@data_jurusan')->name('data_jurusan');
        Route::get('/json_jurusan','AdminController@json_jurusan')->name('json_jurusan');
        Route::post('/input_jurusan','AdminController@input_jurusan')->name('input_jurusan');
        Route::post('/update_jurusan/{id}','AdminController@update_jurusan')->name('update_jurusan');
        Route::get('/hapus_jurusan/{id}','AdminController@hapus_jurusan')->name('hapus_jurusan');

        Route::get('/data_kelas','AdminController@data_kelas')->name('data_kelas');
        Route::get('/form_update_kelas/{id}','AdminController@form_update_kelas')->name('form_update_kelas');
        Route::get('/json_kelas','AdminController@json_kelas')->name('json_kelas');
        Route::get('/data_kelas_jurusan/{id}/{tahun}','AdminController@data_kelas_jurusan')->name('data_kelas_jurusan');
        Route::get('/json_kelas_jurusan/{id}/{tahun}','AdminController@json_kelas_jurusan')->name('json_kelas_jurusan');
        Route::post('/input_kelas','AdminController@input_kelas')->name('input_kelas');
        Route::post('/update_kelas/{id}','AdminController@update_kelas')->name('update_kelas');
        Route::get('/hapus_kelas/{id}','AdminController@hapus_kelas')->name('hapus_kelas');

        Route::get('/data_tahun_ajaran/{id}','AdminController@data_tahun_ajaran')->name('data_tahun_ajaran');
        Route::get('/form_update_tahun_ajaran/{id}','AdminController@form_update_tahun_ajaran')->name('form_update_tahun_ajaran');
        Route::get('/json_tahun_ajaran/{id}','AdminController@json_tahun_ajaran')->name('json_tahun_ajaran');
        Route::post('/input_tahun_ajaran','AdminController@input_tahun_ajaran')->name('input_tahun_ajaran');
        Route::post('/update_tahun_ajaran/{id}','AdminController@update_tahun_ajaran')->name('update_tahun_ajaran');
        Route::get('/hapus_tahun_ajaran/{id}','AdminController@hapus_tahun_ajaran')->name('hapus_tahun_ajaran');

        Route::get('/data_mapel_kelas/{id}/{semester}','AdminController@data_mapel_kelas')->name('data_mapel_kelas');
        Route::get('/form_update_mapel/{id}','AdminController@form_update_mapel')->name('form_update_mapel');
        Route::get('/json_mapel_kelas/{id}/{semester}','AdminController@json_mapel_kelas')->name('json_mapel_kelas');
        Route::post('/input_mapel','AdminController@input_mapel')->name('input_mapel');
        Route::post('/update_mapel/{id}','AdminController@update_mapel')->name('update_mapel');
        Route::get('/hapus_mapel/{id}','AdminController@hapus_mapel')->name('hapus_mapel');
        
        //dev usp
        Route::get('/data_nilai_usp/{id}','AdminController@data_nilai_usp')->name('data_nilai_usp');
        Route::get('/data_mapel_kelas_usp/{id}/{semester}','AdminController@data_mapel_kelas_usp')->name('data_mapel_kelas_usp');
        Route::get('/json_mapel_kelas_usp/{id}/{semester}','AdminController@json_mapel_kelas_usp')->name('json_mapel_kelas_usp');
        Route::get('/json_nilai_usp/{id}','AdminController@json_nilai_usp')->name('json_nilai_usp');
        Route::post('/input_nilai_usp','AdminController@input_nilai_usp')->name('input_nilai_usp');

        
        //dev ukk
        Route::get('/data_nilai_ukk/{id}','AdminController@data_nilai_ukk')->name('data_nilai_ukk');
        Route::get('/data_mapel_kelas_ukk/{id}/{semester}','AdminController@data_mapel_kelas_ukk')->name('data_mapel_kelas_ukk');
        Route::get('/json_mapel_kelas_ukk/{id}/{semester}','AdminController@json_mapel_kelas_ukk')->name('json_mapel_kelas_ukk');
        Route::get('/json_nilai_ukk/{id}','AdminController@json_nilai_ukk')->name('json_nilai_ukk');
        Route::post('/input_nilai_ukk','AdminController@input_nilai_ukk')->name('input_nilai_ukk');
        Route::get('export_nilai_ukk/{kelas_id}/{mapel_id}','AdminController@export_nilai_ukk')->name('export_nilai_ukk');

        

        Route::get('/data_kd_pengetahuan/{id}','AdminController@data_kd_pengetahuan')->name('data_kd_pengetahuan');
        Route::get('/json_kd_pengetahuan/{id}','AdminController@json_kd_pengetahuan')->name('json_kd_pengetahuan');
        Route::get('/data_kd_keterampilan/{id}','AdminController@data_kd_keterampilan')->name('data_kd_keterampilan');
        Route::get('/json_kd_keterampilan/{id}','AdminController@json_kd_keterampilan')->name('json_kd_keterampilan');
        Route::post('/input_kd_mapel','AdminController@input_kd_mapel')->name('input_kd_mapel');
        Route::post('/import_kd_mapel','AdminController@import_kd_mapel')->name('import_kd_mapel');
        Route::get('/export_kd_mapel/{id}','AdminController@export_kd_mapel')->name('export_kd_mapel');
        Route::get('/guru/export_kd_mapel/{id}','AdminController@export_kd_mapel')->name('guru.export_kd_mapel');
        Route::post('/update_kd_mapel/{id}','AdminController@update_kd_mapel')->name('update_kd_mapel');
        Route::get('/hapus_kd_mapel/{id}','AdminController@hapus_kd_mapel')->name('hapus_kd_mapel');
        
        Route::get('/pilih_siswa/{id}/{tahun}/{semester}','AdminController@pilih_siswa')->name('pilih_siswa');
        Route::get('/json_pilih_siswa','AdminController@json_pilih_siswa')->name('json_pilih_siswa');
        Route::get('/data_krs/{id}/{semester}','AdminController@data_krs')->name('data_krs');
        Route::get('/json_krs/{id}/{semester}','AdminController@json_krs')->name('json_krs');
        Route::post('/input_krs','AdminController@input_krs')->name('input_krs');
        Route::post('/update_krs/{id}','AdminController@update_krs')->name('update_krs');
        Route::get('/hapus_krs/{id}','AdminController@hapus_krs')->name('hapus_krs');
        
        Route::get('/data_nilai_pengetahuan/{id}','AdminController@data_nilai_pengetahuan')->name('data_nilai_pengetahuan');
        Route::get('/data_siswa_pengetahuan/{id}','AdminController@data_siswa_pengetahuan')->name('data_siswa_pengetahuan');
        Route::get('/json_nilai_pengetahuan/{id}','AdminController@json_nilai_pengetahuan')->name('json_nilai_pengetahuan');
        Route::get('/json_siswa_pengetahuan/{id}','AdminController@json_siswa_pengetahuan')->name('json_siswa_pengetahuan');
        Route::post('/input_nilai_pengetahuan','AdminController@input_nilai_pengetahuan')->name('input_nilai_pengetahuan');
        Route::post('/import_pengetahuan','AdminController@import_pengetahuan')->name('import_pengetahuan');
        Route::get('/export_pengetahuan/{id}','AdminController@export_pengetahuan')->name('export_pengetahuan');
        Route::get('/hapus_nilai_pengetahuan/{id}','AdminController@hapus_nilai_pengetahuan')->name('hapus_nilai_pengetahuan');
        
        Route::get('/data_nilai_keterampilan/{id}','AdminController@data_nilai_keterampilan')->name('data_nilai_keterampilan');
        Route::get('/json_nilai_keterampilan/{id}','AdminController@json_nilai_keterampilan')->name('json_nilai_keterampilan');
        Route::get('/data_siswa_keterampilan/{id}','AdminController@data_siswa_keterampilan')->name('data_siswa_keterampilan');
        Route::get('/json_siswa_keterampilan/{id}','AdminController@json_siswa_keterampilan')->name('json_siswa_keterampilan');
        Route::post('/input_nilai_keterampilan','AdminController@input_nilai_keterampilan')->name('input_nilai_keterampilan');
        Route::post('/import_keterampilan','AdminController@import_keterampilan')->name('import_keterampilan');
        Route::get('/export_keterampilan/{id}','AdminController@export_keterampilan')->name('export_keterampilan');
        Route::get('/hapus_nilai_keterampilan/{id}','AdminController@hapus_nilai_keterampilan')->name('hapus_nilai_keterampilan');

        Route::get('/data_nilai_sikap/{id}','AdminController@data_nilai_sikap')->name('data_nilai_sikap');
        Route::get('/json_nilai_sikap/{id}','AdminController@json_nilai_sikap')->name('json_nilai_sikap');
        Route::get('/data_siswa_sikap/{id}','AdminController@data_siswa_sikap')->name('data_siswa_sikap');
        Route::get('/json_siswa_sikap/{id}','AdminController@json_siswa_sikap')->name('json_siswa_sikap');
        Route::post('/input_nilai_sikap','AdminController@input_nilai_sikap')->name('input_nilai_sikap');
        Route::post('/import_sikap','AdminController@import_sikap')->name('import_sikap');
        Route::get('/export_sikap/{id}','AdminController@export_sikap')->name('export_sikap');
        Route::get('/hapus_nilai_sikap/{id}','AdminController@hapus_nilai_sikap')->name('hapus_nilai_sikap');

        Route::get('/data_prakerin/{id}','AdminController@data_prakerin')->name('data_prakerin');
        Route::get('/json_prakerin/{id}','AdminController@json_prakerin')->name('json_prakerin');
        Route::post('/input_prakerin','AdminController@input_prakerin')->name('input_prakerin');
        Route::post('/update_prakerin/{id}','AdminController@update_prakerin')->name('update_prakerin');
        Route::get('/hapus_prakerin/{id}','AdminController@hapus_prakerin')->name('hapus_prakerin');

        Route::get('/data_eskul/{id}','AdminController@data_eskul')->name('data_eskul');
        Route::get('/json_eskul/{id}','AdminController@json_eskul')->name('json_eskul');
        Route::post('/input_eskul','AdminController@input_eskul')->name('input_eskul');
        Route::post('/update_eskul/{id}','AdminController@update_eskul')->name('update_eskul');
        Route::get('/hapus_eskul/{id}','AdminController@hapus_eskul')->name('hapus_eskul');

        Route::get('/data_prestasi/{id}','AdminController@data_prestasi')->name('data_prestasi');
        Route::get('/json_prestasi/{id}','AdminController@json_prestasi')->name('json_prestasi');
        Route::post('/input_prestasi','AdminController@input_prestasi')->name('input_prestasi');
        Route::post('/update_prestasi/{id}','AdminController@update_prestasi')->name('update_prestasi');
        Route::get('/hapus_prestasi/{id}','AdminController@hapus_prestasi')->name('hapus_prestasi');

        Route::get('/data_absen/{id}','AdminController@data_absen')->name('data_absen');
        Route::get('/json_absen/{id}','AdminController@json_absen')->name('json_absen');
        Route::post('/input_absen','AdminController@input_absen')->name('input_absen');
        Route::post('/update_absen/{id}','AdminController@update_absen')->name('update_absen');
        Route::get('/hapus_absen/{id}','AdminController@hapus_absen')->name('hapus_absen');

        Route::get('/data_catatan/{id}','AdminController@data_catatan')->name('data_catatan');
        Route::get('/json_catatan/{id}','AdminController@json_catatan')->name('json_catatan');
        Route::post('/input_catatan','AdminController@input_catatan')->name('input_catatan');
        Route::post('/update_catatan/{id}','AdminController@update_catatan')->name('update_catatan');
        Route::get('/hapus_catatan/{id}','AdminController@hapus_catatan')->name('hapus_catatan');

        Route::get('/cetak_nilai_pengetahuan/{id}','AdminController@cetak_nilai_pengetahuan')->name('cetak_nilai_pengetahuan');
        Route::get('/cetak_nilai_keterampilan/{id}','AdminController@cetak_nilai_keterampilan')->name('cetak_nilai_keterampilan');
        Route::get('/cetak_nilai_sikap/{id}','AdminController@cetak_nilai_sikap')->name('cetak_nilai_sikap');
        Route::get('/cetak_sampul/{id}','AdminController@cetak_sampul')->name('cetak_sampul');
        Route::get('/cetak_sampul_all/{id}','AdminController@cetak_sampul_all')->name('cetak_sampul_all');
        Route::get('/cetak_data_sekolah/{id}','AdminController@cetak_data_sekolah')->name('cetak_data_sekolah');
        Route::get('/cetak_data_sekolah_all/{id}','AdminController@cetak_data_sekolah_all')->name('cetak_data_sekolah_all');
        Route::get('/cetak_petunjuk/{id}','AdminController@cetak_petunjuk')->name('cetak_petunjuk');
        Route::get('/cetak_petunjuk_all/{id}','AdminController@cetak_petunjuk_all')->name('cetak_petunjuk_all');
        Route::get('/cetak_data_diri/{id}','AdminController@cetak_data_diri')->name('cetak_data_diri');
        Route::get('/cetak_data_diri_all/{id}','AdminController@cetak_data_diri_all')->name('cetak_data_diri_all');
        Route::get('/cetak_raport/{id}','AdminController@cetak_raport')->name('cetak_raport');
        Route::get('/cetak_raport_all/{id}/{semester}','AdminController@cetak_raport_all')->name('cetak_raport_all');
        Route::get('/cetak_deskripsi/{id}','AdminController@cetak_deskripsi')->name('cetak_deskripsi');
        Route::get('/cetak_deskripsi/{id}/date/{date}','AdminController@cetak_deskripsi_date')->name('cetak_deskripsi_date');
        Route::get('/cetak_deskripsi_all/{id}','AdminController@cetak_deskripsi_all')->name('cetak_deskripsi_all');
        });
    });
});