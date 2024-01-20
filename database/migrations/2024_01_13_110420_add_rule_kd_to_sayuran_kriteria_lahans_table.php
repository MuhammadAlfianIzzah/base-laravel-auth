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
        Schema::table('sayuran_kriteria_lahans', function (Blueprint $table) {
            $table->string('rule_kd');
            $table->foreign('rule_kd')->references('kd')->on('rules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sayuran_kriteria_lahans', function (Blueprint $table) {
            $table->dropForeign(["rule_kd"]);
            $table->dropColumn(["rule_kd"]);
        });
    }
};
