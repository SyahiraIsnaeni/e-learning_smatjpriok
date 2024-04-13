<?php

namespace App\Services\Impl;

use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Services\MataPelajaranSiswaService;

class MataPelajaranSiswaServiceImpl implements MataPelajaranSiswaService
{
    public function getMapel($siswaId)
    {
        $siswa = Siswa::find($siswaId);

        $kelas = $siswa->kelas;

        $mapels = $kelas->mapel()->with('guru')->get();

        $formattedMapels = $mapels->map(function ($mapel) use ($kelas) {
            return [
                'nama_mapel' => $mapel->nama,
                'nama_guru' => $mapel->guru->nama,
                'nama_kelas' => $kelas->nama_kelas
            ];
        });

        return $formattedMapels;
    }
}
