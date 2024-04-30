<?php

namespace App\Services\Impl;

use App\Models\Materi;
use App\Models\MateriSiswa;
use App\Services\MateriSiswaService;
use Illuminate\Database\Eloquent\Collection;

class MateriSiswaServiceImpl implements MateriSiswaService
{
    public function get($mapelId, $studentId)
    {
        $materi = Materi::where('mapel_id', $mapelId)
            ->orderBy('created_at', 'desc')
            ->get();

        $materi->each(function ($materi) use ($studentId) {
            $materiSiswa = MateriSiswa::where('materi_id', $materi->id)
                ->where('siswa_id', $studentId)
                ->select('is_read')
                ->first();

            $materi->is_read = $materiSiswa? $materiSiswa->is_read : null;
        });

        return $materi;
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
            ->where('siswa_id', $siswaId)
            ->firstOrFail();

        $materiSiswa->is_read = $data["is_read"];
        $materiSiswa->save();
    }

}
