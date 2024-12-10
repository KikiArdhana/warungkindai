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
        Schema::create('transaksi_menu', function (Blueprint $table) {
            $table->id(); // ID utama untuk tabel pivot
            $table->unsignedBigInteger('id_transaksi'); // Relasi ke transaksi
            $table->unsignedBigInteger('id_item'); // Relasi ke menu
            $table->integer('quantity'); // Jumlah item yang dibeli
            $table->decimal('total_harga', 15, 2); // Total harga berdasarkan quantity
            $table->timestamps();

            // Menambahkan foreign key untuk id_transaksi yang mengarah ke transaksi
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade');
            
            // Menambahkan foreign key untuk id_item yang mengarah ke menu
            $table->foreign('id_item')->references('id_item')->on('menu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_menu');
    }
};
