<?php

namespace App\Services\Impl;

use App\Models\Guru;
use App\Services\GuruService;
class GuruServiceImpl implements GuruService
{
    public function login(string $emailNip, string $password): bool
    {
        $guru = Guru::where('email', $emailNip)
            ->orWhere('nip', $emailNip)
            ->first();

        if ($guru && password_verify($password, $guru->password)) {
            return true;
        }

        return false; // Login failed
    }

    public function getTeacher($id): ?Guru
    {
        return Guru::find($id);
    }

}
