<?php

namespace App\Http\Controllers;

use App\Models\PengerjaanUjianSiswa;
use App\Models\Siswa;
use App\Services\MataPelajaranDetailSiswaService;
use App\Services\PengerjaanTugasService;
use App\Services\UjianSiswaService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPUnit\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class UjianSiswaController extends Controller
{
    protected $mapelService;
    protected $ujianService;

    public function __construct(UjianSiswaService $ujianService, MataPelajaranDetailSiswaService $mapelService)
    {
        $this->mapelService = $mapelService;
        $this->ujianService = $ujianService;
    }

    public function ujian($mapelId, $siswaId): Response
    {
        $siswa = Siswa::findOrFail($siswaId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $ujian = $this->ujianService->get($mapelId, $siswaId);
        return response()
            ->view("siswa.ujian.view", [
                "title" => "Ujian " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "siswa" => $siswa,
                "mapel" => $mapel,
                "ujian" => $ujian
            ]);
    }

    public function detail($mapelId, $ujianId, $siswaId): Response
    {
        $siswa = Siswa::findOrFail($siswaId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $ujian = $this->ujianService->getDetail($ujianId, $siswaId);
        return response()
            ->view("siswa.ujian.petunjuk", [
                "title" => "Tugas " . $ujian['ujian']->judul,
                "siswa" => $siswa,
                "mapel" => $mapel,
                "ujian" => $ujian,
            ]);
    }

    public function beginExam($mapelId, $ujianId, $siswaId): Response
    {
        $siswa = Siswa::findOrFail($siswaId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $ujian = $this->ujianService->getDetail($ujianId, $siswaId);
        $exam = $this->ujianService->beginExam($ujianId, $siswaId);
        $question = $this->ujianService->getQuestion($ujianId);

        return response()
            ->view("siswa.ujian.pengerjaan", [
                "title" => "Ujian " . $ujian['ujian']->judul,
                "siswa" => $siswa,
                "mapel" => $mapel,
                "ujian" => $ujian,
                "exam" => $exam,
                "question" => $question,
            ]);
    }

    public function assignExam($mapelId, $pengerjaanSiswaId, $ujianId, $siswaId, Request $request): Response|RedirectResponse
    {
        try {

            $jawaban = $request->input('jawaban');
            $pertanyaan = $request->input('pertanyaan');
            $dataJawaban = [];

            foreach ($jawaban as $key => $value) {
                if (isset($pertanyaan[$key]['pertanyaan_id'])) {
                    $pertanyaanId = $pertanyaan[$key]['pertanyaan_id'];

                    $dataJawaban[] = [
                        'jawaban' => $value,
                        'pengerjaanSiswa' => $pengerjaanSiswaId,
                        'pertanyaan_id' => $pertanyaanId,
                    ];
                }
            }

            $this->ujianService->getAnswer($ujianId,$pengerjaanSiswaId, $siswaId, $dataJawaban);

            toast('Berhasil menyelesaikan ujian', 'success');
            return redirect()->route('course-siswa-examination', ['mapelId' => $mapelId, 'siswaId' => $siswaId]);
        } catch (ModelNotFoundException $e) {
            toast('Data pengerjaan siswa tidak ditemukan', 'error');
            return redirect()->back();
        } catch (Exception $e) {
            toast('Terjadi kesalahan saat menyelesaikan ujian', 'error');
            return redirect()->back();
        }
    }

}
