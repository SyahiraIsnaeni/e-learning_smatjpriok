<?php

namespace App\Services\Impl;

use App\Models\DokumenTugas;
use App\Models\DokumenTugasSiswa;
use App\Models\PengerjaanTugas;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Services\TugasService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TugasServiceImpl implements TugasService
{
    public function get($mapelId): ?Collection
    {
        return Tugas::where('mapel_id', $mapelId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getDetail($tugasId)
    {
        return Tugas::with(['pengerjaanTugas' => function ($query) {
            $query->where('status', 'dikumpulkan')->orWhere('status', 'telat dikumpulkan');
        }])->findOrFail($tugasId);
    }

    public function add($mapelId, array $data){
        $tugas = new Tugas();
        $tugas->judul = $data['judul'];
        $tugas->deskripsi = $data['deskripsi'];
        $tugas->deadline = $data['deadline'];
        $tugas->mapel_id = $mapelId;
        $tugas->created_at = Carbon::now('Asia/Jakarta');
        $tugas->updated_at = Carbon::now('Asia/Jakarta');

        $tugas->save();

        if (isset($data['dokumen'])) {
            foreach ($data['dokumen'] as $doc) {
                $originalName = $doc->getClientOriginalName();
                $extension = $doc->getClientOriginalExtension();
                $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_') . '_' . time() . '.' . $extension;
                $dokumenPath = $doc->storeAs('public/tugas/dokumen', $namaFile);
                $dokumenMateri = new DokumenTugas();
                $dokumenMateri->dokumen = $namaFile;
                $dokumenMateri->tugas_id = $tugas->id;
                $dokumenMateri->save();
            }
        }

        $siswa = Siswa::whereHas('kelas.mapel', function ($query) use ($mapelId) {
            $query->where('id', $mapelId);
        })->get();

        foreach ($siswa as $student) {
            $materiSiswa = new PengerjaanTugas();
            $materiSiswa->tugas_id = $tugas->id;
            $materiSiswa->siswa_id = $student->id;
            $materiSiswa->save();
        }

        return $tugas;
    }

    public function edit($tugasId, array $data)
    {
        $tugas = Tugas::findOrFail($tugasId);
        $tugas->judul = $data['judul'];
        $tugas->deskripsi = $data['deskripsi'];
        $tugas->deadline = $data['deadline'];
        $tugas->updated_at = Carbon::now('Asia/Jakarta');

        if (isset($data['dokumen'])) {
            foreach ($tugas->dokumen as $doc) {
                if (!in_array($doc->dokumen, $data['dokumen'])) {
                    Storage::delete('public/tugas/dokumen/' . $doc->dokumen);
                    $doc->delete();
                }
            }

            foreach ($data['dokumen'] as $doc) {
                $originalName = $doc->getClientOriginalName();
                $extension = $doc->getClientOriginalExtension();
                $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_') . '_' . time() . '.' . $extension;
                $imagePath = $doc->storeAs('public/tugas/dokumen', $namaFile);
                $dokumenMateri = new DokumenTugas();
                $dokumenMateri->dokumen = $namaFile;
                $dokumenMateri->tugas_id = $tugas->id;
                $dokumenMateri->save();
            }
        }

        $tugas->save();

        return $tugas;
    }

    public function delete($tugasId)
    {
        $tugas = Tugas::findOrFail($tugasId);

        // Hapus dokumen tugas siswa terlebih dahulu
        foreach ($tugas->pengerjaanTugas as $pengerjaanTugas) {
            if ($pengerjaanTugas->dokumenTugasSiswa) {
                foreach ($pengerjaanTugas->dokumenTugasSiswa as $doc) {
                    Storage::delete('public/tugas/siswa/dokumen/' . $doc->dokumen);
                    $doc->delete();
                }
            }
        }

        // Hapus pengerjaan tugas
        foreach ($tugas->pengerjaanTugas as $pengerjaanTugas) {
            $pengerjaanTugas->delete();
        }

        // Hapus dokumen tugas
        foreach ($tugas->dokumen as $doc) {
            Storage::delete('public/tugas/dokumen/' . $doc->dokumen);
            $doc->delete();
        }

        // Akhirnya, hapus tugas itu sendiri
        $tugas->delete();
    }


    public function addNilai($pengerjaanId, array $data)
    {
        $tugas = PengerjaanTugas::findOrFail($pengerjaanId);
        $tugas->nilai = $data['nilai'];
        $tugas->save();
    }

    public function getAssignDetail($pengerjaanTugasId)
    {
        $pengerjaanTugas = PengerjaanTugas::findOrFail($pengerjaanTugasId);

        $siswa = $pengerjaanTugas->siswa;

        $dokumen = DokumenTugasSiswa::where('pengerjaan_tugas_id', $pengerjaanTugasId)->get();

        return [
            'pengerjaanTugas' => $pengerjaanTugas,
            'siswa' => $siswa,
            'dokumen' => $dokumen,
        ];
    }



    public function alreadySubmit($tugasId)
    {
        return PengerjaanTugas::where('tugas_id', $tugasId)
            ->where('status', 'dikumpulkan')
            ->count();
    }

}
