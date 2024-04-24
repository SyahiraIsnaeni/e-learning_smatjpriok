<?php

namespace App\Services\Impl;

use App\Models\DokumenTugas;
use App\Models\PengerjaanTugas;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Services\TugasService;
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

        foreach ($tugas->dokumenPengerjaanTugas() as $doc) {
            Storage::delete('public/pengerjaan-tugas/dokumen/' . $doc->dokumen);
            $doc->delete();
        }

        foreach ($tugas->pengerjaanTugas as $pengerjaanTugas) {
            $pengerjaanTugas->delete();
        }

        foreach ($tugas->dokumen as $doc) {
            Storage::delete('public/tugas/dokumen/' . $doc->dokumen);
            $doc->delete();
        }

        $tugas->delete();
    }

    public function addNilai($pengerjaanId, array $data)
    {
        $tugas = PengerjaanTugas::findOrFail($pengerjaanId);
        $tugas->nilai = $data['nilai'];
    }

    public function alreadySubmit($tugasId)
    {
        return PengerjaanTugas::where('tugas_id', $tugasId)
            ->where('status', 'dikumpulkan')
            ->count();
    }

}
