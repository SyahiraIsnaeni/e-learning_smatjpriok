<?php

namespace App\Services;

use App\Models\Siswa;

interface SiswaService
{
    public function login(string $emailNis, string $password):bool;

    public function getStudent($id): ?Siswa;
}
