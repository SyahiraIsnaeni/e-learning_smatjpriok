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
        Schema::create('tugas', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->unsignedBigInteger('mapel_id')->nullable(false);
            $table->string('judul')->nullable(false);
            $table->text('deskripsi')->nullable(false);
            $table->timestamp('deadline')->nullable(false);
            $table->timestamps();
            $table->foreign("mapel_id")->references("id")->on("mapel");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
