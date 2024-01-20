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
        Schema::create('konsultasi_kriteria_lahans', function (Blueprint $table) {
            $table->uuid("kd")->primary();
            $table->string('kriteria_lahan_kd');
            $table->foreign('kriteria_lahan_kd')->references('kd')->on('kriteria_lahans')->onDelete('cascade');
            $table->foreignUuid('konsultasi_kd')->references("kd")->on("konsultasis")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi_kriteria_lahans');
    }
};
