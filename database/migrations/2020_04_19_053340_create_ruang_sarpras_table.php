<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangSarprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruang_sarpras', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nama_ruang')->nullable();
            $table->text('kode_ruang')->nullable();
            $table->text('perolehan')->nullable();
            $table->text('tahun')->nullable();
            $table->text('milik')->nullable();
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
        Schema::dropIfExists('ruang_sarpras');
    }
}
