<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelas_id')->unsigned();
            $table->foreign('kelas_id')
                    ->references('id')
                    ->on('kelas')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->integer('siswa_id')->unsigned();
            $table->foreign('siswa_id')
                    ->references('id')
                    ->on('siswas')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->text('semester');
            $table->string('tahun');
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
        Schema::dropIfExists('krs');
    }
}
