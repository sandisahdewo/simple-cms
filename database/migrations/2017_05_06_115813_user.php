<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username', 255);
            $table->string('nama', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->integer('id_grup');
            $table->string('remember_token', 255);
            $table->date('terakhir_login')->nullable();
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
        Schema::dropIfExists('user');
    }
}
