<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PengerjaanTugas extends Model
{
    use HasFactory;

    protected $table = "pengerjaan_tugas";

    protected $primaryKey = "id";

    protected $fillable = [
        'status', 'nilai'
    ];

    public function tugas(): BelongsTo
    {
        return $this->belongsTo(Tugas::class, "tugas_id", "id");
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, "siswa_id", "id");
    }

    public function dokumenTugasSiswa(): HasMany
    {
        return $this->hasMany(DokumenTugasSiswa::class, 'pengerjaan_tugas_id', 'id');
    }
}
