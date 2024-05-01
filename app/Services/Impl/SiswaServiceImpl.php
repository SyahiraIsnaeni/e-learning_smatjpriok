<?php

namespace App\Services\Impl;

use App\Models\Siswa;
use App\Services\SiswaService;

class SiswaServiceImpl implements SiswaService
{
    public function login(string $emailNis, string $password): bool
    {
        $siswa = Siswa::where('email', $emailNis)
            ->orWhere('nis', $emailNis)
            ->first();

        if ($siswa && password_verify($password, $siswa->password)) {
            return true;
        }

        return false;
    }

    public function getStudent($id): ?Siswa
    {
        return Siswa::find($id);
    }

    public function getStudentById($emailNis): ?int
    {
        $siswa = Siswa::where('email', $emailNis)
            ->orWhere('nis', $emailNis)
            ->first();

        return $siswa ? $siswa->id : null;
    }

    public function edit($id, array $data)
    {
        $siswa = Siswa::findOrFail($id);

        if ($data['email'] == null){
            $siswa->password = bcrypt($data['password']);
        }else{
            $siswa->email = $data['email'];
            $siswa->password = bcrypt($data['password']);
        }

        $siswa->save();

        return $siswa;
    }
}
