<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswas";

    protected $primaryKey = "id";

    protected $fillable = ['nama', "nis", "email", "password"];

    public function kelas(): BelongsTo{
        return $this->belongsTo(Kelas::class, "kelas_id", "id");
    }

    public function materi()
    {
        return $this->belongsToMany(Materi::class)
            ->using(MateriSiswa::class)
            ->withPivot('is_read')
            ->withTimestamps();
    }

    public function pengerjaanUjian(): HasMany
    {
        return $this->hasMany(PengerjaanUjianSiswa::class, 'siswa_id', 'id');
    }
}
