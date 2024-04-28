<?php

namespace App\Services\Impl;

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

    public function addPilihanGanda($mapelId, array $data)
    {

    }

    public function addEssai($mapelId, array $data)
    {
        $ujian = new Ujian();
        $ujian->judul = $data['judul'];
        $ujian->deskripsi = $data['deskripsi'];
        $ujian->deadline = $data['deadline'];
        $ujian->durasi = $data['durasi'];
        $ujian->tipe = "essai";
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

    public function editPilihanGanda($ujianId)
    {
        // TODO: Implement editPilihanGanda() method.
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

        // Delete Options
        OpsiJawabanUjian::whereIn('pertanyaan_id', function ($query) use ($ujianId) {
            $query->select('id')
                ->from('pertanyaan_ujians')
                ->where('ujian_id', $ujianId);
        })->delete();

        // Delete Pertanyaans
        PertanyaanUjian::where('ujian_id', $ujianId)->delete();

        // Delete Ujian
        Ujian::where('id', $ujianId)->delete();
    }


}
