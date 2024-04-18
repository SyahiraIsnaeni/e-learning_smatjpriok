<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriSiswa extends Model
{
    use HasFactory;

    protected $table = 'materi_siswas';
    protected $fillable = [
        'is_read',
    ];
}
