<?php

namespace App\Services\Impl;

use App\Models\Guru;
use App\Services\MataPelajaranService;

class MataPelajaranServiceImpl implements MataPelajaranService
{

    public function getMapel($guruId)
    {
        return Guru::find($guruId)->mapel->map(function ($mapel) {
            return [
                'nama_mapel' => $mapel->nama,
                'nama_kelas' => $mapel->kelas->nama_kelas
            ];
        });
    }

    public function getGuru($guruId){

    }

}
