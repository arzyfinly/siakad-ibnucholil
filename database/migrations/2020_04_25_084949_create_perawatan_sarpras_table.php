<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerawatanSarprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perawatan_sarpras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sarpras_id')->unsigned();
            $table->foreign('sarpras_id')
                  ->references('id')
                  ->on('sarpras')
                  ->onDelete('CASCADE')
                  ->onUpdate('cascade');
            $table->text('tanggal')->nullable();
            $table->text('ket')->nullable();
            $table->text('nominal')->nullable();
            $table->text('ttd1')->nullable();
            $table->text('ttd2')->nullable();
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
        Schema::dropIfExists('perawatan_sarpras');
    }
}
