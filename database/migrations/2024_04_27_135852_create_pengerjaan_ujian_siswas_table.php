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
        Schema::create('pengerjaan_ujian_siswas', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->unsignedBigInteger("ujian_id")->nullable(false);
            $table->unsignedBigInteger("siswa_id")->nullable(false);
            $table->float('nilai')->nullable(true);
            $table->dateTime('started_at')->nullable(true);
            $table->dateTime('finished_at')->nullable(true);
            $table->enum('status', ['belum dikerjakan', 'dikerjakan', 'telat dikerjakan'])->default('belum dikerjakan');
            $table->timestamps();
            $table->foreign("ujian_id")->references("id")->on("ujians");
            $table->foreign("siswa_id")->references("id")->on("siswas");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengerjaan_ujian_siswas');
    }
};
