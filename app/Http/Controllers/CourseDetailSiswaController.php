<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Services\MataPelajaranDetailSiswaService;
use App\Services\MataPelajaranSiswaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseDetailSiswaController extends Controller
{
    protected $mapelService;

    public function __construct(MataPelajaranDetailSiswaService $mataPelajaranService)
    {
        $this->mapelService = $mataPelajaranService;
    }

    public function index($mapelId, $siswaId): Response
    {
        $siswa = Siswa::findOrFail($siswaId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        return response()
            ->view("siswa.courses-detail.blade.php", [
                "title" => "Course Detail Siswa",
                "siswa" => $siswa,
                "mapel" => $mapel
            ]);
    }
}
