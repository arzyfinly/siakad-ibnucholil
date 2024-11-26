<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiKeterampilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_keterampilans', function (Blueprint $table) {
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
            $table->integer('praktik1')->nullable();
            $table->integer('praktik2')->nullable();
            $table->integer('praktik3')->nullable();
            $table->integer('praktik4')->nullable();
            $table->integer('praktik5')->nullable();
            $table->integer('praktik6')->nullable();
            $table->integer('portofolio1')->nullable();
            $table->integer('portofolio2')->nullable();
            $table->integer('portofolio3')->nullable();
            $table->integer('portofolio4')->nullable();
            $table->integer('portofolio5')->nullable();
            $table->integer('portofolio6')->nullable();
            $table->integer('proyek1')->nullable();
            $table->integer('proyek2')->nullable();
            $table->integer('proyek3')->nullable();
            $table->integer('proyek4')->nullable();
            $table->integer('proyek5')->nullable();
            $table->integer('proyek6')->nullable();
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
        Schema::dropIfExists('nilai_keterampilans');
    }
}
