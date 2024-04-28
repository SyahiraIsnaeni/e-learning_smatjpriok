<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PengerjaanUjianSiswa extends Model
{
    use HasFactory;

    protected $table = "pengerjaan_ujian_siswas";

    protected $primaryKey = "id";

    protected $fillable = [
        'status', 'nilai', 'finished_at', 'started_at'
    ];

    public function ujian(): BelongsTo
    {
        return $this->belongsTo(Ujian::class, "ujian_id", "id");
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, "siswa_id", "id");
    }

    public function jawaban(): HasMany
    {
        return $this->hasMany(JawabanSiswaUjian::class, 'pengerjaan_ujian_id', 'id');
    }
}
