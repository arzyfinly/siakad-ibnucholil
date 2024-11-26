<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('krs_id')->unsigned();
            $table->foreign('krs_id')
                    ->references('id')
                    ->on('krs')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->text('tahun')->nullable();
            $table->text('catatan')->nullable();
            $table->text('ket')->nullable();
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
        Schema::dropIfExists('catatans');
    }
}
