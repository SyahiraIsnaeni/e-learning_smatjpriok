<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
