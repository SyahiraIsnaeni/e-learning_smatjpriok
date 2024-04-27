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

    public function opsiJawaban(): HasMany
    {
        return $this->hasMany(OpsiJawabanUjian::class, "pertanyaan_id", "id");
    }

    public function jawabanSiswa(): HasMany{
        return $this->hasMany(JawabanSiswaUjian::class, "pertanyaan_id", "id");
    }
}
