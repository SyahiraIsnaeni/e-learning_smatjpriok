<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Services\MataPelajaranDetailGuruService;
use App\Services\MataPelajaranDetailSiswaService;
use App\Services\PengerjaanTugasService;
use App\Services\TugasService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TugasSiswaController extends Controller
{
    protected $mapelService;
    protected $tugasService;

    public function __construct(PengerjaanTugasService $tugasService, MataPelajaranDetailSiswaService $mapelService)
    {
        $this->mapelService = $mapelService;
        $this->tugasService = $tugasService;
    }

    public function tugas($mapelId, $siswaId): Response
    {
        $siswa = Siswa::findOrFail($siswaId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $tugas = $this->tugasService->get($mapelId, $siswaId);
        return response()
            ->view("siswa.tugas.view", [
                "title" => "Tugas " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "siswa" => $siswa,
                "mapel" => $mapel,
                "tugas" => $tugas
            ]);
    }

    public function detail($mapelId, $pengerjaanTugasId, $siswaId): Response
    {
        $siswa = Siswa::findOrFail($siswaId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $tugas = $this->tugasService->getDetail($pengerjaanTugasId, $siswaId);
        return response()
            ->view("siswa.tugas.detail", [
                "title" => "Tugas " . $tugas['tugas']->judul,
                "siswa" => $siswa,
                "mapel" => $mapel,
                "tugas" => $tugas,
            ]);
    }

    public function addTugas($mapelId, $tugasId, $siswaId, Request $request):Response|RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'dokumen.*' => 'required|mimes:pdf,xls,xlsx,doc,docx,jpg,png,jpeg'
        ]);

        if ($validator->fails()) {
            toast('Pastikan dokumen terisi!','Gagal');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'dokumen' => $request->file('dokumen'),
        ];

        $this->tugasService->addAssignment($tugasId, $siswaId, $data);

        toast('Berhasil mengunggah dokumen!','Sukses');

        return redirect()->route('detail-siswa-assignment',  ['mapelId' => $mapelId, 'pengerjaanTugasId' => $tugasId, 'siswaId' => $siswaId]);
    }

    public function deleteDokumen($mapelId, $tugasId, $siswaId):Response|RedirectResponse
    {
        $this->tugasService->resetData($tugasId, $siswaId);

        toast('Berhasil membatalkan pengumpulan tugas!','Sukses');

        return redirect()->route('detail-siswa-assignment',  ['mapelId' => $mapelId, 'pengerjaanTugasId' => $tugasId, 'siswaId' => $siswaId]);
    }
}
