<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('level', function (Blueprint $table) {
            $table->id('id_level'); // Primary Key
            $table->string('nama_level')->unique();
            $table->integer('min_poin');
            $table->integer('max_poin');
            $table->unsignedBigInteger('id_promo')->nullable()->unique(); // Relasi FK opsional
            $table->timestamps();

            $table->foreign('id_promo')->references('id_promo')->on('diskon')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('level');
    }
};
