<?php

namespace App\Services\Impl;

use App\Models\DokumenTugas;
use App\Models\DokumenTugasSiswa;
use App\Models\Materi;
use App\Models\PengerjaanTugas;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Services\PengerjaanTugasService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengerjaanTugasServiceImpl implements PengerjaanTugasService
{

    public function get($mapelId, $studentId)
    {
        $tugas = Tugas::with(['pengerjaanTugas' => function ($query) use ($studentId) {
            $query->select('id', 'status', 'siswa_id');
        }])
            ->where('mapel_id', $mapelId)
            ->orderBy('created_at', 'desc')
            ->get();


        return $tugas;
    }


    public function getDetail($tugasId, $siswaId)
    {
        $tugas = Tugas::findOrFail($tugasId);
        $pengerjaan = $tugas->pengerjaanTugas->where('siswa_id', $siswaId)->first();

        $dokumen = DokumenTugasSiswa::where('pengerjaan_tugas_id', $pengerjaan->id)->get();

        return [
            'tugas' => $tugas,
            'pengerjaanTugas' => $pengerjaan,
            'dokumen' => $dokumen
        ];
    }

    public function addAssignment($tugasId, $siswaId, array $data)
    {
        $tugas = Tugas::findOrFail($tugasId);

        $pengerjaanTugas = $tugas->pengerjaanTugas()->where('siswa_id', $siswaId)->first();

        $deadline = $tugas->deadline;
        $currentTime = Carbon::now('Asia/Jakarta');
        $status = $currentTime > $deadline ? 'telat dikumpulkan' : 'dikumpulkan';

        if (isset($data['dokumen'])) {
            foreach ($data['dokumen'] as $doc) {
                $originalName = $doc->getClientOriginalName();
                $extension = $doc->getClientOriginalExtension();
                $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_') . '_' . time() . '.' . $extension;
                $dokumenPath = $doc->storeAs('public/tugas/siswa/dokumen', $namaFile);

                $dokumenTugas = new DokumenTugasSiswa();
                $dokumenTugas->dokumen = $namaFile;
                $dokumenTugas->pengerjaan_tugas_id = $pengerjaanTugas->id;
                $dokumenTugas->updated_at = Carbon::now('Asia/Jakarta');
                $dokumenTugas->save();
            }
        }

        $pengerjaanTugas->status = $status;
        $pengerjaanTugas->updated_at = Carbon::now('Asia/Jakarta');
        $pengerjaanTugas->save();
    }

    public function resetData($tugasId, $siswaId)
    {
        $tugas = Tugas::findOrFail($tugasId);
        $pengerjaanTugas = $tugas->pengerjaanTugas()->where('siswa_id', $siswaId)->first();

        $dokumenTugasSiswa = DokumenTugasSiswa::where('pengerjaan_tugas_id', $pengerjaanTugas->id)->get();
        foreach ($dokumenTugasSiswa as $dokumen) {
            $dokumen->delete();
        }

        foreach ($dokumenTugasSiswa as $dokumen) {
            Storage::delete('public/tugas/siswa/dokumen/' . $dokumen->dokumen);
        }

        $pengerjaanTugas->status = "belum dikumpulkan";
        $pengerjaanTugas->updated_at = Carbon::now('Asia/Jakarta');
        $pengerjaanTugas->save();
    }


}
