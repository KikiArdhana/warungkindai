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
            $table->decimal('uang_diterima', 15, 2)->nullable()->after('metode_pembayaran'); // Add uang_diterima
            $table->decimal('kembalian', 15, 2)->nullable()->after('uang_diterima'); // Add kembalian
        });
    }
    
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('uang_diterima');
            $table->dropColumn('kembalian');
        });
    }
    
};
