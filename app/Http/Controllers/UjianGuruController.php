<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Services\MataPelajaranDetailGuruService;
use App\Services\TugasService;
use App\Services\UjianService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UjianGuruController extends Controller
{
    protected $mapelService;
    protected $ujianService;

    public function __construct(UjianService $ujianService, MataPelajaranDetailGuruService $mapelService)
    {
        $this->mapelService = $mapelService;
        $this->ujianService = $ujianService;
    }

    public function ujian($mapelId, $guruId): Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $ujian = $this->ujianService->get($mapelId);
        return response()
            ->view("guru.ujian.view", [
                "title" => "Ujian " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "guru" => $guru,
                "mapel" => $mapel,
                "ujian" => $ujian
            ]);
    }

    public function add($mapelId, $guruId): Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        return response()
            ->view("guru.ujian.add", [
                "title" => "Ujian " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "guru" => $guru,
                "mapel" => $mapel,
            ]);
    }

    public function addPilihanGanda($mapelId, $guruId): Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        return response()
            ->view("guru.ujian.pilihan-ganda", [
                "title" => "Ujian " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "guru" => $guru,
                "mapel" => $mapel,
            ]);
    }

    public function addEssai($mapelId, $guruId): Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        return response()
            ->view("guru.ujian.essai", [
                "title" => "Ujian " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "guru" => $guru,
                "mapel" => $mapel,
            ]);
    }

    public function addDataEssai($mapelId, $guruId, Request $request): Response|RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required',
            'durasi' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi');
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $nomor = $request->input('nomor');
            $pertanyaan = $request->input('pertanyaan');

            $dataPertanyaan = [];

            // Loop melalui setiap pertanyaan dan nomor yang diberikan
            foreach ($pertanyaan as $key => $value) {
                $dataPertanyaan[$key]['pertanyaan'] = $value;
                // Pastikan nomor ada di dalam array nomor[]
                if (isset($nomor[$key])) {
                    $dataPertanyaan[$key]['nomor'] = $nomor[$key];
                } else {
                    // Jika tidak ada nomor yang sesuai, berikan nomor default
                    $dataPertanyaan[$key]['nomor'] = 'Soal ' . ($key + 1);
                }
            }

            $data = [
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'deadline' => $request->input('deadline'),
                'durasi' => $request->input('durasi'),
                'pertanyaan' => $dataPertanyaan
            ];

            try {
                $this->ujianService->addEssai($mapelId, $data);

                Alert::success('Sukses', 'Berhasil Menambah Data Ujian');

                return redirect()->route('course-guru-examination',  ['mapelId' => $mapelId, 'guruId' => $guruId]);
            } catch (\Exception $e) {
                Alert::error('Gagal', 'Pastikan data deskripsi dan soal tidak dimasukkan gambar ataupun dokumen');
                return redirect()->back();
            }
        }


    }

    public function detailUjian($mapelId, $ujianId, $guruId):Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $ujian = $this->ujianService->getDetail($ujianId);
        $totalSubmit = $this->ujianService->alreadySubmit($ujianId);
        return response()
            ->view("guru.ujian.detail", [
                "title" => "Ujian " . $ujian->judul,
                "guru" => $guru,
                "mapel" => $mapel,
                "ujian" => $ujian,
                "total" => $totalSubmit
            ]);
    }

    public function edit($mapelId, $ujianId, $guruId):Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $ujian = $this->ujianService->getDetailPertanyaan($ujianId);
        return response()
            ->view("guru.ujian.edit", [
                "title" => "Edit Ujian " . $ujian->judul,
                "guru" => $guru,
                "mapel" => $mapel,
                "ujian" => $ujian
            ]);
    }

    public function editDataUjian($mapelId, $ujianId, $guruId, Request $request):Response|RedirectResponse
    {
        if (($request->input('judul') == null) || ($request->input('deskripsi') == null)) {
            Alert::error('Gagal', 'Pastikan judul dan deskripsi terisi');
            return redirect()->back();
        }

        $nomor = $request->input('nomor');
        $pertanyaan = $request->input('pertanyaan');

        $dataPertanyaan = [];

        foreach ($pertanyaan as $key => $value) {
            $dataPertanyaan[$key]['pertanyaan'] = $value;
            if (isset($nomor[$key])) {
                $dataPertanyaan[$key]['nomor'] = $nomor[$key];
            } else {
                // Jika tidak ada nomor yang sesuai, berikan nomor default
                $dataPertanyaan[$key]['nomor'] = 'Soal ' . ($key + 1);
            }
        }

        $data = [
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'deadline' => $request->input('deadline'),
            'durasi' => $request->input('durasi'),
            'pertanyaan' => $dataPertanyaan
        ];

        try {
            $this->ujianService->editEssai($ujianId, $data);

            Alert::success('Sukses', 'Berhasil Mengubah Data Ujian');

            return redirect()->route('course-guru-examination', ['mapelId' => $mapelId, 'guruId' => $guruId]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Pastikan data deskripsi dan soal tidak dimasukkan gambar ataupun dokumen');
            return redirect()->back();
        }
    }

    public function delete($mapelId, $ujianId, $guruId): Response|RedirectResponse
    {
        $this->ujianService->delete($ujianId);
        Alert::success('Sukses', 'Berhasil Menghapus Data Ujian');
        return redirect()->route('course-guru-examination', ['mapelId' => $mapelId, 'guruId' => $guruId]);
    }

}
