<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('motivasis', function (Blueprint $table) {
            $table->foreignId('home_id')->constrained()->onDelete('cascade')->before('foto_motivasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motivasis', function (Blueprint $table) {
            $table->dropColumn('home_id');
        });
    }
};
