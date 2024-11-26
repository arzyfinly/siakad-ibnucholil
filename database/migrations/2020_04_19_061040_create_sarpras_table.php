<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras', function (Blueprint $table) {
            $table->increments('id');
            $table->text('inventaris_barang')->nullable();
            $table->text('nomor_barang')->nullable();
            $table->text('letak')->nullable();
            $table->text('nama_barang')->nullable();
            $table->text('merek')->nullable();
            $table->text('tahun')->nullable();
            $table->text('anggaran')->nullable();
            $table->text('nominal')->nullable();
            $table->text('jumlah')->nullable();
            $table->text('spesifikasi')->nullable();
            $table->text('fungsi')->nullable();
            $table->text('pic')->nullable();
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
        Schema::dropIfExists('sarpras');
    }
}
