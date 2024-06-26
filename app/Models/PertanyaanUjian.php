<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PertanyaanUjian extends Model
{
    use HasFactory;

    protected $table = "pertanyaan_ujians";

    protected $primaryKey = "id";

    protected $fillable = ['pertanyaan'];


    public function ujian(): BelongsTo{
        return $this->belongsTo(Ujian::class, "ujian_id", "id");
    }

    public function jawaban(): HasMany{
        return $this->hasMany(JawabanSiswaUjian::class, "pertanyaan_id", "id");
    }
}
