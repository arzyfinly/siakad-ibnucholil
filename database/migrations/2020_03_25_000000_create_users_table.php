<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('username');
            $table->text('password');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles')
                  ->onDelete('CASCADE')
                  ->onUpdate('cascade');
            $table->text('pic');
            $table->text('status');
            $table->text('no_kartu')->nullable();;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
