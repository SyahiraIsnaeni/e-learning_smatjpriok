<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Services\MataPelajaranSiswaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardSiswaController extends Controller
{
    protected $mapelService;

    public function __construct(MataPelajaranSiswaService $mataPelajaranService)
    {
        $this->mapelService = $mataPelajaranService;
    }

    public function index($id): Response
    {
        $siswa = Siswa::findOrFail($id);
        $mapels = $this->mapelService->getMapel($id);
        $totalSukses = $this->mapelService->countTaskSiswa1($id);
        $totalTask = $this->mapelService->countTaskSiswa2($id);
        $totalSelesai = round(($totalSukses / $totalTask) * 100, 1);
        $totalBelumSelesai = round(100 - $totalSelesai, 1);
        $firstMateri = $this->mapelService->firstMateri($id);
        $firstTugas = $this->mapelService->firstTugas($id);
        $firstUjian = $this->mapelService->firstUjian($id);
        return response()
            ->view("siswa.dashboard", [
                "title" => "Dashboard Siswa E-Learning SMA Tanjung Priok",
                "siswa" => $siswa,
                "mapels" => $mapels,
                "totalSelesai" => $totalSelesai,
                "firstMateri" => $firstMateri,
                "firstTugas" => $firstTugas,
                "firstUjian" => $firstUjian,
            ]);
    }
}
