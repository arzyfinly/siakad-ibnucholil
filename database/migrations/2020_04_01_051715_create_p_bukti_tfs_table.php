<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePBuktiTfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_bukti_tfs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();;
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('CASCADE')
                  ->onUpdate('cascade');
            $table->text('jumlah_tf');
            $table->text('pic');
            $table->text('v_status');
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
        Schema::dropIfExists('p_bukti_tfs');
    }
}
