<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk mengimpor DB

class UpdateTanggalTransaksiInTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Mengatur nilai default tanggal_transaksi ke tanggal hari ini
            $table->date('tanggal_transaksi')->default(DB::raw('CURRENT_DATE'))->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Menghapus default value dari kolom
            $table->date('tanggal_transaksi')->nullable(false)->default(null)->change();
        });
    }
}
