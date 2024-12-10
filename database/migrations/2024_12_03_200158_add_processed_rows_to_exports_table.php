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
        Schema::table('exports', function (Blueprint $table) {
            $table->integer('processed_rows')->default(0);
            $table->integer('successful_rows')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('exports', function (Blueprint $table) {
            $table->dropColumn(['processed_rows', 'successful_rows']);
        });
    }
    
};
