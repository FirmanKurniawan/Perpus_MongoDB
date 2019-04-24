<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_buku')->index();
            $table->string('judul_buku')->index();
            $table->string('pengarang')->index();
            $table->string('kategori')->index();
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
        Schema::dropIfExists('daftar_bukus');
    }
}
