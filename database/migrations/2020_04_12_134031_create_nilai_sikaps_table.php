<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSikapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_sikaps', function (Blueprint $table) {
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
            $table->integer('sikap')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('alpha')->nullable();
            $table->integer('izin')->nullable();
            $table->integer('sakit')->nullable();
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
        Schema::dropIfExists('nilai_sikaps');
    }
}
