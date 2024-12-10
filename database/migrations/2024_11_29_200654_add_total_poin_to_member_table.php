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
        Schema::table('member', function (Blueprint $table) {
            $table->integer('total_poin')->default(0); // Menambahkan kolom total_poin dengan default 0
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('member', function (Blueprint $table) {
            $table->dropColumn('total_poin'); // Menghapus kolom total_poin saat rollback
        });
    }
};
