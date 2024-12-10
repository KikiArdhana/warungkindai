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
        Schema::table('diskon', function (Blueprint $table) {
            $table->unsignedBigInteger('id_level')->nullable(); // Menambahkan kolom FK
            $table->foreign('id_level')->references('id_level')->on('level')->onDelete('cascade'); // Menambahkan relasi FK
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('diskon', function (Blueprint $table) {
            $table->dropForeign(['id_level']); // Menghapus relasi FK
            $table->dropColumn('id_level'); // Menghapus kolom
        });
    }
};
