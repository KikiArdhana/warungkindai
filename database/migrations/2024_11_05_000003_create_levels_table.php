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
        Schema::create('level', function (Blueprint $table) {
            $table->id('id_level');
            $table->string('nama_level');
            $table->integer('min_poin');
            $table->integer('max_poin');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('level');
    }
};
