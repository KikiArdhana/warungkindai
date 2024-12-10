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
            $table->decimal('diskon', 5, 2)->nullable()->after('total_pembelian');
        });
    }
    
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('diskon');
        });
    }
    
};