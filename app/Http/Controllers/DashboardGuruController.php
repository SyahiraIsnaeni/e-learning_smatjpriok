<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Services\MataPelajaranService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardGuruController extends Controller
{
    protected $mapelService;

    public function __construct(MataPelajaranService $mataPelajaranService)
    {
        $this->mapelService = $mataPelajaranService;
    }

    public function index($id): Response
    {
        $guru = Guru::findOrFail($id);
        $mapels = $this->mapelService->getMapel($id);
        return response()
            ->view("guru.dashboard", [
                "title" => "Dashboard Guru E-Learning SMA Tanjung Priok",
                "guru" => $guru,
                "mapels" => $mapels
            ]);
    }
}
