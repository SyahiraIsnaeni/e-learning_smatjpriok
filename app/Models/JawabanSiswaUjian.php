<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JawabanSiswaUjian extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = "jawaban_siswa_ujians";

    protected $primaryKey = "id";

    protected $fillable = ['jawaban', 'nilai', 'status'];


    public function ujian(): BelongsTo{
        return $this->belongsTo(Ujian::class, "ujian_id", "id");
    }

    public function siswa(): BelongsTo{
        return $this->belongsTo(Siswa::class, "siswa_id", "id");
    }

    public function pertanyaan(): BelongsTo{
        return $this->belongsTo(PertanyaanUjian::class, "pertanyaan_id", "id");
    }

    public function opsi(): BelongsTo{
        return $this->belongsTo(OpsiJawabanUjian::class, "opsi_id", "id");
    }

}
