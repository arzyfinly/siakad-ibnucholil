<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nama_lengkap');
            $table->text('nuptk')->nullable();
            $table->text('jk')->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->text('tanggal_lahir')->nullable();
            $table->text('nip');
            $table->text('sk')->nullable();
            $table->text('jenis_ptk')->nullable();
            $table->text('agama')->nullable();
            $table->text('kk')->nullable();
            $table->text('nik')->nullable();
            $table->text('alamat')->nullable();
            $table->text('rt')->nullable();
            $table->text('rw')->nullable();
            $table->text('dusun')->nullable();
            $table->text('desa')->nullable();
            $table->text('kecamatan')->nullable();
            $table->text('kabupaten')->nullable();
            $table->text('provinsi')->nullable();
            $table->text('kode_pos')->nullable();
            $table->text('no_hp')->nullable();
            $table->text('email')->nullable();
            $table->text('tugas_tambahan')->nullable();
            $table->text('nama_ibu')->nullable();
            $table->text('sp')->nullable();
            $table->text('nama_pasangan')->nullable();
            $table->text('jumlah_anak')->nullable();
            $table->text('nama_bank')->nullable();
            $table->text('no_rek')->nullable();
            $table->text('an')->nullable();
            $table->text('sk_pengangkatan')->nullable();
            $table->text('tmt_pengangkatan')->nullable();
            $table->text('lembaga_pengangkatan')->nullable();
            $table->text('sumber_gaji')->nullable();
            $table->text('nama_sd')->nullable();
            $table->text('tahun_masuk_sd')->nullable();
            $table->text('tahun_lulus_sd')->nullable();
            $table->text('nama_smp')->nullable();
            $table->text('tahun_masuk_smp')->nullable();
            $table->text('tahun_lulus_smp')->nullable();
            $table->text('nama_sma')->nullable();
            $table->text('tahun_masuk_sma')->nullable();
            $table->text('tahun_lulus_sma')->nullable();
            $table->text('nama_s1')->nullable();
            $table->text('tahun_masuk_s1')->nullable();
            $table->text('tahun_lulus_s1')->nullable();
            $table->text('nama_s2')->nullable();
            $table->text('tahun_masuk_s2')->nullable();
            $table->text('tahun_lulus_s2')->nullable();
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
        Schema::dropIfExists('gurus');
    }
}
