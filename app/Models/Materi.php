<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materi extends Model
{
    use HasFactory;

    protected $table = "materis";

    protected $primaryKey = "id";

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'dokumen'];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)
            ->using(MateriSiswa::class)
            ->withPivot('is_read')
            ->withTimestamps();
    }

    public function mapel(): BelongsTo{
        return $this->belongsTo(MataPelajaran::class, "mapel_id", "id");
    }

    public function materiSiswa(): HasMany
    {
        return $this->hasMany(MateriSiswa::class, "materi_id", "id");
    }

    public function dokumen(): HasMany{
        return $this->hasMany(DokumenMateri::class, "materi_id", "id");
    }
}
