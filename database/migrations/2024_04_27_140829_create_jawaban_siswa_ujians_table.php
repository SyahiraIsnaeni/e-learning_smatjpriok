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
        Schema::create('jawaban_siswa_ujians', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->unsignedBigInteger("pengerjaan_ujian_id")->nullable(false);
            $table->unsignedBigInteger("pertanyaan_id")->nullable(false);
            $table->unsignedBigInteger("opsi_id")->nullable(true);
            $table->text("jawaban")->nullable(true);
            $table->float("poin")->nullable(true);
            $table->foreign("pengerjaan_ujian_id")->references("id")->on("pengerjaan_ujian_siswas");
            $table->foreign("pertanyaan_id")->references("id")->on("pertanyaan_ujians");
            $table->foreign("opsi_id")->references("id")->on("opsi_jawaban_ujians");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_siswa_ujians');
    }
};
