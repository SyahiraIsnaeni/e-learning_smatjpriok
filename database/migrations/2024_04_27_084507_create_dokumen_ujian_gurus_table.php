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
        Schema::create('dokumen_ujian_gurus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ujian_id');
            $table->string('dokumen')->nullable(true);
            $table->timestamps();
            $table->foreign("ujian_id")->references("id")->on("ujians");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_ujian_gurus');
    }
};
