<?php

namespace App\Services\Impl;

use App\Models\Jadwal;
use App\Services\JadwalService;

class JadwalServiceImpl implements JadwalService
{

    public function getSiswa($kelasId)
    {
        $jadwal = Jadwal::with(['mapel.kelas'])
            ->whereHas('mapel.kelas', function ($query) use ($kelasId) {
                $query->where('id', $kelasId);
            })
            ->orderBy('day_id')
            ->orderBy('start_time')
            ->get();

        return $jadwal;
    }

    public function getGuru($guruId)
    {
        $jadwal = Jadwal::with(['mapel.guru'])
            ->whereHas('mapel.guru', function ($query) use ($guruId) {
                $query->where('id', $guruId);
            })
            ->orderBy('day_id')
            ->orderBy('start_time')
            ->get();

        return $jadwal;
    }
}
