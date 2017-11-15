<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Komentar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar', function(Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_komentar');
            $table->string('komentar', 255)->nullable();
            $table->string('nama', 64);
            $table->string('email', 64)->nullable();
            $table->string('tipe', 16);
            $table->string('status', 16);
            $table->integer('id_induk')->default(null);
            $table->string('is_admin', 32);
            $table->string('dibuat_oleh', 64);
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
        Schema::dropIfExists('komentar');
    }
}
