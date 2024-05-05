<?php

namespace App\Services\Impl;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Services\DataSiswaService;

class DataSiswaServiceImpl implements DataSiswaService
{

    public function getKelas()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        return $kelas;
    }

    public function getSiswa($kelasId)
    {
        $siswa = Siswa::where('kelas_id', $kelasId)->get();

        return $siswa;
    }

    public function edit($id, array $data)
    {
        $siswa = Siswa::findOrFail($id);

        if ($data["email"] == null){
            $siswa->password = bcrypt($data['password']);
        }else{
            $siswa->password = bcrypt($data['password']);
            $siswa->email = $data['email'];
        }

        $siswa->save();

        return $siswa;
    }
}
