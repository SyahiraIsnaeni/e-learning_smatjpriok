<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tugas extends Model
{
    use HasFactory;
    protected $table = "tugas";

    protected $primaryKey = "id";

    protected $fillable = ['judul', 'deskripsi', 'deadline'];


    public function mapel(): BelongsTo{
        return $this->belongsTo(MataPelajaran::class, "mapel_id", "id");
    }

    public function pengerjaanTugas(): HasMany
    {
        return $this->hasMany(PengerjaanTugas::class, "tugas_id", "id");
    }

    public function dokumen(): HasMany{
        return $this->hasMany(DokumenTugas::class, "tugas_id", "id");
    }

    public function dokumenPengerjaanTugas()
    {
        return DokumenTugas::whereIn('tugas_id', $this->pengerjaanTugas->pluck('id'))->get();
    }
}
