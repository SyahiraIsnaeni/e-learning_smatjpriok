<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Day extends Model
{
    protected $table = "days";

    protected $primaryKey = "id";

    protected $fillable = ['nama'];

    public function jadwals(): HasMany {
        return $this->hasMany(Jadwal::class,'day_id', "id");
    }
}
