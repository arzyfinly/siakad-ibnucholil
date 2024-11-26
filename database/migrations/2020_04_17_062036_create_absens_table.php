<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('krs_id')->unsigned();
            $table->foreign('krs_id')
                    ->references('id')
                    ->on('krs')
                    ->onDelete('CASCADE')
                    ->onUpdate('cascade');
            $table->text('tahun')->nullable();
            $table->text('izin')->nullable();
            $table->text('sakit')->nullable();
            $table->text('alpha')->nullable();
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
        Schema::dropIfExists('absens');
    }
}
