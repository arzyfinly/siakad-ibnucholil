<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->bigIncrements('id');
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
            $table->integer('nilai')->nullable();
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
        Schema::dropIfExists('nilais');
    }
}
