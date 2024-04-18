<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = "mapel";

    protected $primaryKey = "id";

    protected $fillable = ['nama', "kelas_id", "guru_id"];

    public function kelas(): BelongsTo{
        return $this->belongsTo(Kelas::class, "kelas_id", "id");
    }

    public function guru(): BelongsTo{
        return $this->belongsTo(Guru::class, "guru_id", "id");
    }

    public function materi(): HasMany
    {
        return $this->hasMany(Materi::class);
    }
}
