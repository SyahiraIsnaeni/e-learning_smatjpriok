<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Services\Impl\MataPelajaranDetailGuruServiceImpl;
use App\Services\MataPelajaranDetailSiswaService;
use App\Services\MateriGuruService;
use App\Services\MateriSiswaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class MateriSiswaController extends Controller
{
    protected $materiService;
    protected $mapelService;

    public function __construct(MateriSiswaService $materiService, MataPelajaranDetailSiswaService $mapelService)
    {
        $this->materiService = $materiService;
        $this->mapelService = $mapelService;
    }

    public function materi($mapelId, $siswaId): Response
    {
        $siswa = Siswa::findOrFail($siswaId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $materi = $this->materiService->get($mapelId, $siswaId);
        return response()
            ->view("siswa.materi.view", [
                "title" => "Materi " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "siswa" => $siswa,
                "mapel" => $mapel,
                "materi" => $materi
            ]);
    }

    public function detail($mapelId, $materiId, $siswaId): Response|RedirectResponse
    {
        $siswa = Siswa::findOrFail($siswaId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $materi = $this->materiService->getDetail($materiId, $siswaId);

        return response()
            ->view("siswa.materi.detail", [
                "title" => "Detail Materi " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "siswa" => $siswa,
                "mapel" => $mapel,
                "materi" => $materi
            ]);
    }

    public function isRead($mapelId, $materiId, $siswaId, Request $request): Response|RedirectResponse
    {
        $data = [
            'is_read' => $request->input('is_read'),
        ];

        $this->materiService->markAsRead($materiId, $siswaId, $data);

        toast('Selesai Membaca Materi!','success');

        return redirect()->route('course-siswa-material',  ['mapelId' => $mapelId, 'siswaId' => $siswaId]);
    }
}
