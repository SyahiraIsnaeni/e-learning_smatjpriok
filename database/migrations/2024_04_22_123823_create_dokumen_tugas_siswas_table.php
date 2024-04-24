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
        Schema::create('dokumen_tugas_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengerjaan_tugas_id')->nullable(true);
            $table->string('dokumen');
            $table->timestamps();
            $table->foreign("pengerjaan_tugas_id")->references("id")->on("pengerjaan_tugas");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_tugas_siswas');
    }
};
