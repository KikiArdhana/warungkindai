<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveIdTransaksiAndIdLevelFromDiskonTable extends Migration
{
    public function up()
    {
        Schema::table('diskon', function (Blueprint $table) {
            $table->dropForeign(['id_transaksi']); // Jika ada foreign key
            $table->dropForeign(['id_level']); // Jika ada foreign key
            $table->dropColumn('id_transaksi'); // Hapus kolom
            $table->dropColumn('id_level'); // Hapus kolom
        });
    }

    public function down()
    {
        Schema::table('diskon', function (Blueprint $table) {
            $table->unsignedBigInteger('id_transaksi')->nullable(); // Tambahkan kembali kolom
            $table->unsignedBigInteger('id_level')->nullable(); // Tambahkan kembali kolom
            // Jika perlu, tambahkan foreign key
            // $table->foreign('id_transaksi')->references('id')->on('transaksi');
            // $table->foreign('id_level')->references('id')->on('level');
        });
    }
}
