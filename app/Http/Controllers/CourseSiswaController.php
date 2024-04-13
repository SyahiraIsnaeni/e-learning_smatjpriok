<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Services\MataPelajaranSiswaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseSiswaController extends Controller
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
            ->view("siswa.courses", [
                "title" => "Course Siswa",
                "siswa" => $siswa,
                "mapels" => $mapels
            ]);
    }
}
