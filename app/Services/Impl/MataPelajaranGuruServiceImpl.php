<?php

namespace App\Services\Impl;

use App\Models\Guru;
use App\Services\MataPelajaranGuruService;

class MataPelajaranGuruServiceImpl implements MataPelajaranGuruService
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
