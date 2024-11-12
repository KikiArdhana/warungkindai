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
        Schema::create('poin', function (Blueprint $table) {
            $table->id('id_poin');
            $table->unsignedBigInteger('id_pelanggan');
            $table->integer('jumlah_poin');
            $table->date('tanggal_diberikan');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('member');
        });
    }

    public function down()
    {
        Schema::dropIfExists('poin');
    }
};
