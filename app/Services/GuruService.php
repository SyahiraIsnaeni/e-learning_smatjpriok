<?php

namespace App\Services;

use App\Models\Guru;

interface GuruService
{
    public function login(string $emailNip, string $password):bool;

    public function getTeacher($id): ?Guru;

    public function getTeacherById($emailNip): ?int;
}
