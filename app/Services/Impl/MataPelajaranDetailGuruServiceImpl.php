<?php

namespace App\Services\Impl;

use App\Models\MataPelajaran;
use App\Services\MataPelajaranDetailGuruService;

class MataPelajaranDetailGuruServiceImpl implements MataPelajaranDetailGuruService
{
    public function getMapelDetail($mapelId)
    {
        $mapel = MataPelajaran::find($mapelId);

        $kelas = $mapel->kelas;

        return [
            'nama_kelas' => $kelas->nama_kelas,
            'nama_mapel' => $mapel->nama,
        ];
    }
}
