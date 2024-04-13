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
        return response()
            ->view("siswa.dashboard", [
                "title" => "Dashboard Siswa E-Learning SMA Tanjung Priok",
                "siswa" => $siswa,
                "mapels" => $mapels
            ]);
    }
}
