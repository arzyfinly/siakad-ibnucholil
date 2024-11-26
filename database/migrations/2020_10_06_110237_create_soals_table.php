<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mapel_id')->unsigned();
            $table->foreign('mapel_id')
                    ->references('id')
                    ->on('mapels')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->integer('ujian_id')->unsigned();
            $table->foreign('ujian_id')
                    ->references('id')
                    ->on('ujians')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->text('soal_text')->nullable();
            $table->text('soal_gambar')->nullable();
            $table->text('text_a')->nullable();
            $table->text('gambar_a')->nullable();
            $table->text('text_b')->nullable();
            $table->text('gambar_b')->nullable();
            $table->text('text_c')->nullable();
            $table->text('gambar_c')->nullable();
            $table->text('text_d')->nullable();
            $table->text('gambar_d')->nullable();
            $table->text('text_e')->nullable();
            $table->text('gambar_e')->nullable();
            $table->text('kunci')->nullable();
            $table->text('tipe')->nullable();
            $table->text('skor')->nullable();
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
        Schema::dropIfExists('soals');
    }
}
