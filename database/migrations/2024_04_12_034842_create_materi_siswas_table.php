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
        Schema::create('materi_siswas', function (Blueprint $table) {
            $table->id();
            $table->boolean("is_read")->default("0");
            $table->unsignedBigInteger("materi_id");
            $table->unsignedBigInteger("siswa_id");
            $table->foreign("materi_id")->references("id")->on("materis");
            $table->foreign("siswa_id")->references("id")->on("siswas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi_siswas');
    }
};
