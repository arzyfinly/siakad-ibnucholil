<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('kelas');
            $table->text('ket');
            $table->integer('jurusan_id')->unsigned();
            $table->foreign('jurusan_id')
                    ->references('id')
                    ->on('jurusans')
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
        Schema::dropIfExists('kelas');
    }
}
