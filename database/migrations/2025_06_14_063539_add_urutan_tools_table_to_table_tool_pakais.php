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
        Schema::table('tool_pakais', function (Blueprint $table) {
            $table->integer('urutan_tools')->after('judul_tool');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tool_pakais', function (Blueprint $table) {
            $table->dropColumn('urutan_tools');
        });
    }
};
