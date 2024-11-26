<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPengetahuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_pengetahuans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('krs_id')->unsigned();
            $table->foreign('krs_id')
                    ->references('id')
                    ->on('krs')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->integer('kelas_id')->unsigned();
            $table->foreign('kelas_id')
                    ->references('id')
                    ->on('kelas')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade'); 
            $table->integer('mapel_id')->unsigned();
            $table->foreign('mapel_id')
                    ->references('id')
                    ->on('mapels')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade'); 
            $table->integer('siswa_id')->unsigned(); 
            $table->foreign('siswa_id')
                    ->references('id')
                    ->on('siswas')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->integer('tugas1')->nullable();
            $table->integer('tugas2')->nullable();
            $table->integer('tugas3')->nullable();
            $table->integer('tugas4')->nullable();
            $table->integer('tugas5')->nullable();
            $table->integer('tugas6')->nullable();
            $table->integer('uh1')->nullable();
            $table->integer('uh2')->nullable();
            $table->integer('uh3')->nullable();
            $table->integer('uh4')->nullable();
            $table->integer('uh5')->nullable();
            $table->integer('uh6')->nullable();
            $table->integer('uts')->nullable();
            $table->integer('uas')->nullable();
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
        Schema::dropIfExists('nilai_pengetahuans');
    }
}
