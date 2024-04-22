<?php

namespace App\Services\Impl;

use App\Models\Materi;
use App\Models\MateriSiswa;
use App\Services\MateriSiswaService;
use Illuminate\Database\Eloquent\Collection;

class MateriSiswaServiceImpl implements MateriSiswaService
{
    public function get($mapelId, $siswaId): ?Collection
    {
        return Materi::whereHas('mapel', function ($query) use ($mapelId) {
            $query->where('id', $mapelId);
        })
            ->with(['materiSiswa' => function ($query) use ($siswaId) {
                $query->where('siswa_id', $siswaId);
            }])
            ->get(['id', 'judul', 'deskripsi', 'created_at'])
            ->map(function ($materi) {
                $materi->is_read = $materi->materiSiswa->isEmpty() ? false : $materi->materiSiswa->first()->is_read;
                return $materi;
            });
    }

    public function getDetail($materiId, $siswaId)
    {
        $materi = Materi::findOrFail($materiId);

        $isRead = $materi->materiSiswa->where('siswa_id', $siswaId)->first()->is_read ?? false;

        return ['materi' => $materi, 'is_read' => $isRead];
    }

    public function markAsRead($materiId, $siswaId, array $data)
    {
        $materiSiswa = MateriSiswa::where('materi_id', $materiId)
            ->where('student_id', $siswaId)
            ->firstOrFail();

        $materiSiswa->is_read = $data["is_read"];
        $materiSiswa->save();
    }

}
