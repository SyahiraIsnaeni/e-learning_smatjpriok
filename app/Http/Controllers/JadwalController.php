<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Services\JadwalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JadwalController extends Controller
{
    protected $jadwalService;

    public function __construct(JadwalService $jadwalService)
    {
        $this->jadwalService = $jadwalService;
    }

    public function siswa($siswaId, $kelasId):Response
    {
        $siswa = Siswa::findOrFail($siswaId);
        $jadwal = $this->jadwalService->getSiswa($kelasId);
        return response()
            ->view("siswa.jadwal", [
                "title" => "Jadwal Siswa E-Learning SMA Tanjung Priok",
                "jadwal" => $jadwal,
                "siswa" => $siswa,
            ]);
    }

    public function guru($guruId):Response
    {
        $guru = Guru::findOrFail($guruId);
        $jadwal = $this->jadwalService->getGuru($guruId);
        return response()
            ->view("guru.jadwal", [
                "title" => "Jadwal Guru E-Learning SMA Tanjung Priok",
                "jadwal" => $jadwal,
                "guru" => $guru,
            ]);
    }
}
