<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama_kasir');
            $table->string('role');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
