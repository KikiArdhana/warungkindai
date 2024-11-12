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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_item');
            $table->decimal('subtotal_harga', 15, 2);
            $table->timestamps();

            // Set foreign keys
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade');
            $table->foreign('id_item')->references('id_item')->on('menu')->onDelete('cascade');

            // Set primary key as a composite key
            $table->primary(['id_transaksi', 'id_item']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
