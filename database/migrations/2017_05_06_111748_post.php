<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function(Blueprint $table) {
            $table->increments('id');
            $table->string('judul', 255);
            $table->date('tanggal_posting');
            $table->text('isi')->nullable();
            $table->string('jenis', 32);
            $table->string('format', 32);
            $table->string('status', 32);
            $table->string('gambar', 255)->nullable();
            $table->string('dibuat_oleh', '64');
            $table->string('diubah_oleh', '64')->nullable();
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
        Schema::dropIfExists('post'); 
    }
}
