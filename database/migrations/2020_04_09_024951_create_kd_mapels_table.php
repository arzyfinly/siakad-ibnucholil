<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKdMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kd_mapels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mapel_id')->unsigned();
            $table->foreign('mapel_id')
                    ->references('id')
                    ->on('mapels')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->string('no_kd');
            $table->string('kd');
            $table->string('kriteria');
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
        Schema::dropIfExists('kd_mapels');
    }
}
