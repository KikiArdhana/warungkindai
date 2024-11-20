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
        Schema::create('member', function (Blueprint $table) {
            $table->id('id_pelanggan');
            $table->unsignedBigInteger('id_level');
            $table->string('nama_pelanggan');
            $table->string('no_telepon')->unique();
            $table->timestamps();

            $table->foreign('id_level')->references('id_level')->on('level');
        });
    }

    public function down()
    {
        Schema::dropIfExists('member');
    }
};
