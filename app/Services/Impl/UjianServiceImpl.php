<?php

namespace App\Services\Impl;

use App\Exports\UjianExport;
use App\Models\JawabanSiswaUjian;
use App\Models\OpsiJawabanUjian;
use App\Models\PengerjaanUjianSiswa;
use App\Models\PertanyaanUjian;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\Ujian;
use App\Services\UjianService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class UjianServiceImpl implements UjianService
{
    public function get($mapelId)
    {
        return Ujian::where('mapel_id', $mapelId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getDetail($ujianId)
    {
        return Ujian::with(['pengerjaanSiswa' => function ($query) {
            $query->where('status', 'dikerjakan')->orWhere('status', 'telat dikerjakan');
        }])->findOrFail($ujianId);
    }

    public function getDetailPertanyaan($ujianId)
    {
        return Ujian::with('pertanyaan')->findOrFail($ujianId);
    }

    public function alreadySubmit($ujianId)
    {
        return PengerjaanUjianSiswa::where('ujian_id', $ujianId)
            ->where('status', 'dikerjakan')
            ->count();
    }

    public function addEssai($mapelId, array $data)
    {
        $ujian = new Ujian();
        $ujian->judul = $data['judul'];
        $ujian->deskripsi = $data['deskripsi'];
        $ujian->deadline = $data['deadline'];
        $ujian->durasi = $data['durasi'];
        $ujian->mapel_id = $mapelId;
        $ujian->created_at = Carbon::now('Asia/Jakarta');
        $ujian->updated_at = Carbon::now('Asia/Jakarta');

        $ujian->save();

        $siswa = Siswa::whereHas('kelas.mapel', function ($query) use ($mapelId) {
            $query->where('id', $mapelId);
        })->get();

        foreach ($siswa as $student) {
            $ujianSiswa = new PengerjaanUjianSiswa();
            $ujianSiswa->ujian_id = $ujian->id;
            $ujianSiswa->siswa_id = $student->id;
            $ujianSiswa->save();
        }

        foreach ($data['pertanyaan'] as $pertanyaan) {
            $pertanyaanUjian = new PertanyaanUjian();
            $pertanyaanUjian->pertanyaan = $pertanyaan['pertanyaan'];
            $pertanyaanUjian->nomor = $pertanyaan['nomor'];
            $pertanyaanUjian->ujian_id = $ujian->id;
            $pertanyaanUjian->save();
        }

        return $ujian;
    }

    public function editEssai($ujianId, array $data)
    {
        $ujian = Ujian::findOrFail($ujianId);
        $ujian->judul = $data['judul'];
        $ujian->deskripsi = $data['deskripsi'];
        $ujian->deadline = $data['deadline'];
        $ujian->durasi = $data['durasi'];
        $ujian->updated_at = Carbon::now('Asia/Jakarta');
        $ujian->save();

        $pertanyaanUjian = PertanyaanUjian::where('ujian_id', $ujianId)->get();

        foreach ($pertanyaanUjian as $pertanyaan) {
            $pertanyaanData = collect($data['pertanyaan'])->firstWhere('id', $pertanyaan->id);
            if ($pertanyaanData) {
                $pertanyaan->pertanyaan = $pertanyaanData['pertanyaan'];
                $pertanyaan->save();
            }
        }

        return $ujian;
    }

    public function delete($ujianId)
    {
        // Delete Jawaban Ujian Siswa
        JawabanSiswaUjian::whereIn('pengerjaan_ujian_id', function ($query) use ($ujianId) {
            $query->select('id')
                ->from('pengerjaan_ujian_siswas')
                ->where('ujian_id', $ujianId);
        })->delete();

        PengerjaanUjianSiswa::where('ujian_id', $ujianId)->delete();

        // Delete Pertanyaans
        PertanyaanUjian::where('ujian_id', $ujianId)->delete();

        // Delete Ujian
        Ujian::where('id', $ujianId)->delete();
    }

    public function getJawaban($ujianId, $pengerjaanId)
    {
        $pertanyaan = PertanyaanUjian::where('ujian_id', $ujianId)->get();

        $jawabanSiswa = JawabanSiswaUjian::where('pengerjaan_ujian_id', $pengerjaanId)->get();

        $pengerjaanSiswa = PengerjaanUjianSiswa::findOrFail($pengerjaanId);

        $siswa = $pengerjaanSiswa->siswa;

        $data = [];

        foreach ($pertanyaan as $pertanyaanItem) {
            $jawabanPertanyaan = null;

            foreach ($jawabanSiswa as $jawaban) {
                $jawabanPertanyaan = $jawaban;
            }

            $data[] = [
                'pertanyaan' => $pertanyaanItem,
                'jawaban' => $jawabanPertanyaan,
            ];
        }

        return [
            'data' => $data,
            'pengerjaanSiswa' => $pengerjaanSiswa,
            'siswa' => $siswa,
        ];
    }

    public function addPenilaian($ujianId, $pengerjaanId, array $data)
    {
        $totalPoin = 0;

        foreach ($data as $jawaban) {
            $previousJawaban = $this->getPreviousJawaban($pengerjaanId, $jawaban['pertanyaan_id']);

            $jawabanSiswa = JawabanSiswaUjian::where('pengerjaan_ujian_id', $pengerjaanId)
                ->where('pertanyaan_id', $jawaban['pertanyaan_id'])
                ->first();

            if ($jawabanSiswa) {
                if (isset($jawaban['poin'])) {
                    $jawabanSiswa->poin = $jawaban['poin'];
                } else {
                    $jawabanSiswa->poin = $previousJawaban['poin'];
                }

                $jawabanSiswa->save();

                $totalPoin += $jawabanSiswa->poin;
            }
        }

        $pengerjaanUjianSiswa = PengerjaanUjianSiswa::findOrFail($pengerjaanId);
        $pengerjaanUjianSiswa->nilai = $totalPoin;
        $pengerjaanUjianSiswa->save();
    }

    private function getPreviousJawaban($pengerjaanId, $pertanyaanId)
    {
        $previousJawaban = JawabanSiswaUjian::where('pengerjaan_ujian_id', $pengerjaanId)
            ->where('pertanyaan_id', $pertanyaanId)
            ->first();

        return $previousJawaban ? ['poin' => $previousJawaban->poin] : [];
    }

    public function nilai($ujianId)
    {
        $ujian = Ujian::where("id", $ujianId)->first();
        $namaFile = "ujian_" . str_replace(' ', '_', $ujian->judul) . '.xlsx';

        return Excel::download(new UjianExport($ujianId), $namaFile);
    }

}
