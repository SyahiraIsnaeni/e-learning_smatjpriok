<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    use HasFactory;

    protected $table = "gurus";

    protected $primaryKey = "id";

    protected $fillable = ['nama', 'nip', 'email', 'password'];

    public function mapel(): HasMany{
        return $this->hasMany(MataPelajaran::class, "guru_id", "id");
    }
}
