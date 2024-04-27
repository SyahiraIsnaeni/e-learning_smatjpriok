<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OpsiJawabanUjian extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = "opsi_jawaban_ujians";

    protected $primaryKey = "id";

    protected $fillable = ['opsi', 'is_correct'];

    public function pertanyaan(): BelongsTo{
        return $this->belongsTo(PertanyaanUjian::class, "pertanyaan_id", "id");
    }

    public function jawabanSiswa(): HasMany
    {
        return $this->hasMany(JawabanSiswaUjian::class, "opsi_id", "id");
    }
}
