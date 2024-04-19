<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenMateri extends Model
{
    use HasFactory;

    protected $table = "dokumen_materis";
    protected $primaryKey = "id";

    protected $fillable = [
        "dokumen", "materi_id"
    ];

    public function dokumen(): BelongsTo{
        return $this->belongsTo(Materi::class, "materi_id", "id");
    }
}
