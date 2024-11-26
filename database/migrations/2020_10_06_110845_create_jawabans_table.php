<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id')->unsigned();
            $table->foreign('siswa_id')
                    ->references('id')
                    ->on('siswas')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->integer('ujian_id')->unsigned();
            $table->foreign('ujian_id')
                    ->references('id')
                    ->on('ujians')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->integer('soal_id')->unsigned();
            $table->foreign('soal_id')
                    ->references('id')
                    ->on('soals')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->text('jawaban')->nullable();
            $table->text('status')->nullable();
            $table->integer('skor')->nullable();
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
        Schema::dropIfExists('jawabans');
    }
}
