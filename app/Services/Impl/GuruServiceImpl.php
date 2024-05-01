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

    public function getTeacherById($emailNip): ?int
    {
        $guru = Guru::where('email', $emailNip)
            ->orWhere('nip', $emailNip)
            ->first();

        return $guru ? $guru->id : null;
    }

    public function edit($id, array $data)
    {
        $guru = Guru::findOrFail($id);

        if ($data['email'] == null){
            $guru->password = bcrypt($data['password']);
        }else{
            $guru->email = $data['email'];
            $guru->password = bcrypt($data['password']);
        }

        $guru->save();

        return $guru;
    }

}
