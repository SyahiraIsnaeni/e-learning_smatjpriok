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
        Schema::create('pertanyaan_ujians', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->unsignedBigInteger("ujian_id")->nullable(false);
            $table->text("pertanyaan")->nullable(false);
            $table->timestamps();
            $table->foreign("ujian_id")->references("id")->on("ujians");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan_ujians');
    }
};
