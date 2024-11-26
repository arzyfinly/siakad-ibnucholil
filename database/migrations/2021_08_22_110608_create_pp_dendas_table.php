<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpDendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pp_dendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pp_peminjam_id')->unsigned();
            $table->foreign('pp_peminjam_id')
                  ->references('id')
                  ->on('pp_peminjams')
                  ->onDelete('CASCADE')
                  ->onUpdate('cascade');
            $table->integer('denda')->nullable();
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
        Schema::dropIfExists('pp_dendas');
    }
}
