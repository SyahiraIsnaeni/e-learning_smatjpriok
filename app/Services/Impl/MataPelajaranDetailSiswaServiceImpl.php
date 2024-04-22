<?php

namespace App\Services\Impl;

use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Services\MataPelajaranDetailSiswaService;

class MataPelajaranDetailSiswaServiceImpl implements MataPelajaranDetailSiswaService
{
    public function getMapelDetail($mapelId)
    {
        $mapel = MataPelajaran::find($mapelId);

        $kelas = $mapel->kelas;

        return [
            'nama_kelas' => $kelas->nama_kelas,
            'nama_mapel' => $mapel->nama,
            'mapel_id' => $mapel->id,
        ];
    }
}
