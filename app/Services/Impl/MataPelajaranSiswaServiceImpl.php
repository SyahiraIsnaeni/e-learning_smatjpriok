<?php

namespace App\Services\Impl;

use App\Models\MataPelajaran;
use App\Models\Materi;
use App\Models\MateriSiswa;
use App\Models\PengerjaanTugas;
use App\Models\PengerjaanUjianSiswa;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\Ujian;
use App\Services\MataPelajaranSiswaService;
use Illuminate\Support\Facades\DB;

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
                'mapel_id'=> $mapel->id,
                'nama_guru' => $mapel->guru->nama,
                'nama_kelas' => $kelas->nama_kelas
            ];
        });

        return $formattedMapels;
    }

    public function countTaskSiswa1($studentId)
    {
        $totalPengerjaanUjian = PengerjaanUjianSiswa::where('siswa_id', $studentId)
            ->where(function ($query) {
                $query->where('status', 'dikerjakan')
                    ->orWhere('status', 'telat dikerjakan');
            })
            ->count();

        $totalPengerjaanTugas = PengerjaanTugas::where('siswa_id', $studentId)
            ->where(function ($query) {
                $query->where('status', 'dikumpulkan')
                    ->orWhere('status', 'telat dikumpulkan');
            })
            ->count();

        $totalMateriSiswa = MateriSiswa::where("siswa_id", $studentId)->where('is_read', 1)->count();

        $totalSemua = $totalPengerjaanUjian + $totalPengerjaanTugas + $totalMateriSiswa;

        return $totalSemua;
    }

    public function countTaskSiswa2($studentId)
    {
        $totalPengerjaanUjian = PengerjaanUjianSiswa::where("siswa_id", $studentId)->count();

        $totalPengerjaanTugas = PengerjaanTugas::where("siswa_id", $studentId)->count();

        $totalMateriSiswa = MateriSiswa::where("siswa_id", $studentId)->count();

        $totalSemua = $totalPengerjaanUjian + $totalPengerjaanTugas + $totalMateriSiswa;

        return $totalSemua;
    }

    public function firstTugas($studentId)
    {
        return Tugas::join('pengerjaan_tugas', 'tugas.id', '=', 'pengerjaan_tugas.tugas_id')
            ->where('pengerjaan_tugas.siswa_id', $studentId)
            ->where('pengerjaan_tugas.status', "belum dikumpulkan")
            ->select('tugas.*')
            ->first();
    }

    public function firstUjian($studentId)
    {
        return Ujian::join('pengerjaan_ujian_siswas', 'ujians.id', '=', 'pengerjaan_ujian_siswas.ujian_id')
            ->where('pengerjaan_ujian_siswas.siswa_id', $studentId)
            ->where('pengerjaan_ujian_siswas.status', "belum dikerjakan")
            ->select('ujians.*')
            ->first();
    }

    public function firstMateri($studentId)
    {
        return Materi::join('materi_siswas', 'materis.id', '=', 'materi_siswas.materi_id')
            ->where('materi_siswas.siswa_id', $studentId)
            ->where('materi_siswas.is_read', 0)
            ->select('materis.*')
            ->first();
    }

}
