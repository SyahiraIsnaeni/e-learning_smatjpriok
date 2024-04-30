<?php

namespace App\Services\Impl;

use App\Models\JawabanSiswaUjian;
use App\Models\PengerjaanUjianSiswa;
use App\Models\PertanyaanUjian;
use App\Models\Tugas;
use App\Models\Ujian;
use App\Services\UjianSiswaService;
use Carbon\Carbon;

class UjianSiswaServiceImpl implements UjianSiswaService
{
    public function get($mapelId, $studentId)
    {
        $ujian = Ujian::with(['pengerjaanSiswa' => function ($query) use ($studentId) {
            $query->select('id', 'status', 'siswa_id');
        }])
            ->where('mapel_id', $mapelId)
            ->orderBy('created_at', 'desc')
            ->get();

        return $ujian;
    }

    public function getDetail($ujianId, $studentId)
    {
        $ujian = Ujian::findOrFail($ujianId);
        $pengerjaanSiswa = PengerjaanUjianSiswa::where('ujian_id', $ujianId)
            ->where('siswa_id', $studentId)
            ->first();

        return [
            'ujian' => $ujian,
            'pengerjaanSiswa' => $pengerjaanSiswa,
        ];
    }

    public function beginExam($ujianId, $siswaId)
    {
        $ujian = Ujian::with(['pengerjaanSiswa' => function ($query) use ($siswaId) {
            $query->where('siswa_id', $siswaId);
        }])->findOrFail($ujianId);

        $pengerjaanSiswa = PengerjaanUjianSiswa::updateOrCreate(
            ['ujian_id' => $ujianId, 'siswa_id' => $siswaId],
            ['started_at' => Carbon::now('Asia/Jakarta')]
        );

        return ['ujian' => $ujian, 'pengerjaanSiswa' => $pengerjaanSiswa];
    }

    public function getQuestion($ujianId)
    {
        $ujian = Ujian::with('pertanyaan')->findOrFail($ujianId);

        if ($ujian->pertanyaan->isEmpty()) {
            return null; // Atau bisa juga mengembalikan array kosong [], tergantung kebutuhan Anda
        }

        return $ujian->pertanyaan;
    }

    public function getAnswer($ujianId, $pengerjaanSiswaId, $siswaId, array $data)
    {
        $ujian = Ujian::find($ujianId);
        $pertanyaanCollection = PertanyaanUjian::where('ujian_id', $ujianId)->get();

        $pengerjaanSiswa = PengerjaanUjianSiswa::where('ujian_id', $ujianId)
            ->where('siswa_id', $siswaId)
            ->firstOrFail();

        $pengerjaanSiswa->finished_at = Carbon::now('Asia/Jakarta');

        if (Carbon::now('Asia/Jakarta') > $ujian->deadline) {
            $pengerjaanSiswa->status = "telat dikerjakan";
        } else {
            $pengerjaanSiswa->status = "dikerjakan";
        }

        foreach ($pertanyaanCollection as $index => $pertanyaan) {
            if (isset($data[$index]['jawaban'])) {
                $jawabanSiswa = new JawabanSiswaUjian();
                $jawabanSiswa->jawaban = $data[$index]['jawaban'];
                $jawabanSiswa->pengerjaan_ujian_id = $pengerjaanSiswaId;
                $jawabanSiswa->pertanyaan_id = $pertanyaan->id;
                $jawabanSiswa->save();
            }
        }

        $pengerjaanSiswa->save();
    }




    public function updateStatus($ujianId, $siswaId, $finished_at)
    {
        $ujian = Ujian::find($ujianId);

        if ($ujian) {
            $deadline = $ujian->deadline;

            $pengerjaanSiswa = PengerjaanUjianSiswa::where('ujian_id', $ujianId)
                ->where('siswa_id', $siswaId)
                ->first();

            if ($pengerjaanSiswa) {
                if ($finished_at > $deadline) {
                    $pengerjaanSiswa->status = "telat dikerjakan";
                } else {
                    $pengerjaanSiswa->status = "dikerjakan";
                }

                $pengerjaanSiswa->save();
            }
        }
    }

}
