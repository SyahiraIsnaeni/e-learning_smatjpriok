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
        Schema::create('materis', function (Blueprint $table) {
            $table->id()->nullable(false)->primary();
            $table->string("judul")->nullable(false);
            $table->text("deskripsi")->nullable(false);
            $table->string("gambar")->nullable(true);
            $table->string("dokumen")->nullable(true);
            $table->unsignedBigInteger("mapel_id")->nullable(false);
            $table->foreign("mapel_id")->references("id")->on("mapel");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};
