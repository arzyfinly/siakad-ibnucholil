<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nama_lengkap');
            $table->text('jk')->nullable();
            $table->text('nomor_kk')->nullable();
            $table->text('nik')->nullable();
            $table->text('nomor_akte')->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->text('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->text('desa')->nullable();
            $table->text('kecamatan')->nullable();
            $table->text('kabupaten')->nullable();
            $table->text('provinsi')->nullable();
            $table->text('kode_pos')->nullable();
            $table->text('no_hp')->nullable();
            $table->text('bahasa')->nullable();
            $table->text('tinggi_badan')->nullable();
            $table->text('berat_badan')->nullable();
            $table->text('anak_ke')->nullable();
            $table->text('saudara_kandung')->nullable();
            $table->text('saudara_tiri')->nullable();
            $table->text('hobi')->nullable();
            $table->text('riwayat_sakit')->nullable();
            $table->text('buta_warna')->nullable();
            $table->text('kelainan_fisik')->nullable();
            $table->text('lingkar_kepala')->nullable();
            $table->text('cita_cita')->nullable();
            $table->text('golongan_darah')->nullable();
            $table->text('keterangan_tempat_tinggal')->nullable();

            $table->text('sekolah_asal')->nullable();
            $table->text('npsn')->nullable();
            $table->text('alamat_sekolah')->nullable();
            $table->text('desa_sekolah')->nullable();
            $table->text('kecamatan_sekolah')->nullable();
            $table->text('kabupaten_sekolah')->nullable();
            $table->text('provinsi_sekolah')->nullable();
            $table->text('kode_pos_sekolah')->nullable();
            $table->text('lama_sekolah')->nullable();
            $table->text('npun')->nullable();
            $table->text('ijazah_sd')->nullable();
            $table->text('skhun_sd')->nullable();
            $table->text('orang_tua_sd')->nullable();
            $table->text('ijazah_smp')->nullable();
            $table->text('skhun_smp')->nullable();
            $table->text('orang_tua_smp')->nullable();
            
            $table->text('no_ijazah')->nullable();
            $table->text('tanggal_lulusan_ijazah')->nullable();
            $table->text('mutasi')->nullable();
            $table->text('keterangan_mutasi')->nullable();
            $table->text('pic_lulus')->nullable();

            $table->text('nis')->nullable();
            $table->text('nisn');
            $table->text('pilihan_jurusan')->nullable();
            $table->text('tahun')->nullable();
            $table->text('ukuran_baju')->nullable();

            $table->text('nama_ayah')->nullable();
            $table->text('nik_ayah')->nullable();
            $table->text('nomor_ayah')->nullable();
            $table->text('tempat_lahir_ayah')->nullable();
            $table->text('tanggal_lahir_ayah')->nullable();
            $table->text('pekerjaan_ayah')->nullable();
            $table->text('pendidikan_ayah')->nullable();
            $table->text('penghasilan_ayah')->nullable();

            $table->text('nama_ibu')->nullable();
            $table->text('nik_ibu')->nullable();
            $table->text('nomor_ibu')->nullable();
            $table->text('tempat_lahir_ibu')->nullable();
            $table->text('tanggal_lahir_ibu')->nullable();
            $table->text('pekerjaan_ibu')->nullable();
            $table->text('pendidikan_ibu')->nullable();
            $table->text('penghasilan_ibu')->nullable();

            $table->text('nama_wali')->nullable();
            $table->text('nik_wali')->nullable();
            $table->text('nomor_wali')->nullable();
            $table->text('tempat_lahir_wali')->nullable();
            $table->text('tanggal_lahir_wali')->nullable();
            $table->text('pekerjaan_wali')->nullable();
            $table->text('pendidikan_wali')->nullable();
            $table->text('penghasilan_wali')->nullable();
            
            $table->text('nomor_kip')->nullable();
            $table->text('nomor_pkh')->nullable();
            $table->text('nomor_sk')->nullable();
            
            $table->text('pic');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('CASCADE')
                  ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
