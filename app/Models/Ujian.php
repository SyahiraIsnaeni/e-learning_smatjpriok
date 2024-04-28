<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ujian extends Model
{
    use HasFactory;

    protected $table = "ujians";

    protected $primaryKey = "id";


    protected $fillable = ['judul', 'deskripsi', 'deadline', 'durasi', 'tipe'];


    public function mapel(): BelongsTo{
        return $this->belongsTo(MataPelajaran::class, "mapel_id", "id");
    }

    public function pertanyaan(): HasMany
    {
        return $this->hasMany(PertanyaanUjian::class, "ujian_id", "id");
    }

    public function pengerjaanSiswa(): HasMany{
        return $this->hasMany(PengerjaanUjianSiswa::class, "ujian_id", "id");
    }
}
