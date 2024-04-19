<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MateriSiswa extends Model
{
    use HasFactory;

    protected $table = 'materi_siswas';
    protected $fillable = [
        'is_read',
    ];

    public function materi(): BelongsTo
    {
        return $this->belongsTo(Materi::class, "materi_id", "id");
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, "siswa_id", "id");
    }
}
