<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id');
            $table->string('nama_wisata');
            $table->string('slug');
            $table->integer('harga');
            $table->text('deskripsi');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('waktu_buka');
            $table->string('latitude');
            $table->string('longitude');
            $table->text('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wisatas');
    }
}
