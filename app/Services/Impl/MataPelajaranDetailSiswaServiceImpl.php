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

        return $mapel->nama;
    }
}
