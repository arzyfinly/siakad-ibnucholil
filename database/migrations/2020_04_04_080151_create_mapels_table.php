<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nama_mapel');
            $table->text('ket');
            $table->text('kategori');
            $table->text('semester');
            $table->text('tahun');
            $table->integer('urut');
            $table->integer('jurusan_id')->unsigned();
            $table->foreign('jurusan_id')
                    ->references('id')
                    ->on('jurusans')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->integer('kelas_id')->unsigned();
            $table->foreign('kelas_id')
                    ->references('id')
                    ->on('kelas')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->integer('guru_id')->unsigned();
            $table->foreign('guru_id')
                    ->references('id')
                    ->on('gurus')
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
        Schema::dropIfExists('mapels');
    }
}
