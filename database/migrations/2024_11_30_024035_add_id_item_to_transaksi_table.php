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
        Schema::table('transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_item')->after('id_pelanggan')->nullable();

            // Menambahkan foreign key untuk hubungan dengan tabel menu
            $table->foreign('id_item')->references('id_item')->on('menu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Menghapus foreign key dan kolom id_item
            $table->dropForeign(['id_item']);
            $table->dropColumn('id_item');
        });
    }
};
