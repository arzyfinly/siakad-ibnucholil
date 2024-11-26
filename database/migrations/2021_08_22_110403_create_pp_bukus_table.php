<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pp_bukus', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tanggal_terima');
            $table->text('no_klasifikasi');
            $table->text('pengarang');
            $table->text('judul');
            $table->text('perolehan');
            $table->text('penerbit');
            $table->text('tahun_terbit');
            $table->text('harga');
            $table->text('deskripsi');
            $table->integer('jumlah_halaman');
            $table->integer('jumlah_buku');
            $table->text('pic');
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
        Schema::dropIfExists('pp_bukus');
    }
}
