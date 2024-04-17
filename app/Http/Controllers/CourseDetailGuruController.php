<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Services\MataPelajaranDetailGuruService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseDetailGuruController extends Controller
{
    protected $mapelService;

    public function __construct(MataPelajaranDetailGuruService $mataPelajaranService)
    {
        $this->mapelService = $mataPelajaranService;
    }

    public function index($mapelId, $guruId): Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        return response()
            ->view("guru.courses-detail", [
                "title" => "Course Detail Guru",
                "guru" => $guru,
                "mapel" => $mapel
            ]);
    }
}
