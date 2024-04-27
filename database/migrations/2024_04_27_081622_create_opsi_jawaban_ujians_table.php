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
        Schema::create('opsi_jawaban_ujians', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->unsignedBigInteger("pertanyaan_id")->nullable(false);
            $table->string("opsi")->nullable(false);
            $table->boolean("is_correct")->default(false);
            $table->timestamps();
            $table->foreign("pertanyaan_id")->references("id")->on("pertanyaan_ujians");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opsi_jawaban_ujians');
    }
};
