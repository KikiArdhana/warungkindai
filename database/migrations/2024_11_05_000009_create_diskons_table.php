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
        Schema::create('diskon', function (Blueprint $table) {
            $table->id('id_promo');
            $table->decimal('syarat_pembelian', 15, 2);
            $table->decimal('diskon', 5, 2);
            $table->string('nama_promo');
            $table->timestamps();

           
        });
    }

    public function down()
    {
        Schema::dropIfExists('diskon');
    }
};
