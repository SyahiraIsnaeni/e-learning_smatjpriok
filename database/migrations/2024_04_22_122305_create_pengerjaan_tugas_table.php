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
        Schema::create('pengerjaan_tugas', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->unsignedBigInteger('tugas_id')->nullable(false);
            $table->unsignedBigInteger('siswa_id')->nullable(false);
            $table->enum('status', ['belum dikumpulkan', 'dikumpulkan', 'telat dikumpulkan'])->default('belum dikumpulkan');
            $table->float('nilai')->nullable(true);
            $table->timestamps();
            $table->foreign("tugas_id")->references("id")->on("tugas");
            $table->foreign("siswa_id")->references("id")->on("siswas");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengerjaan_tugas');
    }
};
