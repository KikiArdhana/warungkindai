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
            $table->string('file_name')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('exports', function (Blueprint $table) {
            $table->dropColumn('file_name');
        });
    }
    
};