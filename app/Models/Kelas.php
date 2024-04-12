<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";

    protected $primaryKey = "id";

    protected $fillable = ['nama_kelas'];

    public function mapel(): HasMany{
        return $this->hasMany(MataPelajaran::class, "kelas_id", "id");
    }
}
