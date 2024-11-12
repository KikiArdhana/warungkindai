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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_pegawai');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_poin')->nullable();
            $table->date('tanggal_transaksi');
            $table->decimal('total_pembelian', 15, 2);
            $table->string('metode_pembayaran');
            $table->timestamps();

            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('member');
            $table->foreign('id_poin')->references('id_poin')->on('poin');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};