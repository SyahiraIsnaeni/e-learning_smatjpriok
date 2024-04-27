<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Services\MataPelajaranDetailGuruService;
use App\Services\MateriGuruService;
use App\Services\TugasService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TugasGuruController extends Controller
{
    protected $mapelService;
    protected $tugasService;

    public function __construct(TugasService $tugasService, MataPelajaranDetailGuruService $mapelService)
    {
        $this->mapelService = $mapelService;
        $this->tugasService = $tugasService;
    }

    public function tugas($mapelId, $guruId): Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $tugas = $this->tugasService->get($mapelId);
        return response()
            ->view("guru.tugas.view", [
                "title" => "Tugas " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "guru" => $guru,
                "mapel" => $mapel,
                "tugas" => $tugas
            ]);
    }

    public function add($mapelId, $guruId): Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        return response()
            ->view("guru.tugas.add", [
                "title" => "Tambah Tugas " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "judul" => "Tambah Tugas " . $mapel["nama_mapel"],
                "guru" => $guru,
                "mapel" => $mapel,
            ]);
    }

    public function addDataTugas($mapelId, $guruId, Request $request):Response|RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required',
            'dokumen.*' => 'mimes:pdf,xls,xlsx,doc,docx,jpg,png,jpeg'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi dan Sesuai Ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'deadline' => $request->input('deadline'),
            'dokumen' => $request->file('dokumen'),
        ];

        $this->tugasService->add($mapelId, $data);

        Alert::success('Sukses', 'Berhasil Menambah Data Tugas');

        return redirect()->route('course-guru-assignment',  ['mapelId' => $mapelId, 'guruId' => $guruId]);
    }

    public function detailTugas($mapelId, $tugasId, $guruId):Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $tugas = $this->tugasService->getDetail($tugasId);
        $totalSubmit = $this->tugasService->alreadySubmit($tugasId);
        return response()
            ->view("guru.tugas.detail", [
                "title" => "Tugas " . $tugas->judul,
                "guru" => $guru,
                "mapel" => $mapel,
                "tugas" => $tugas,
                "total" => $totalSubmit
            ]);
    }

    public function edit($mapelId, $tugasId, $guruId):Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $tugas = $this->tugasService->getDetail($tugasId);
        return response()
            ->view("guru.tugas.edit", [
                "title" => "Edit Materi " . $tugas->judul,
                "guru" => $guru,
                "mapel" => $mapel,
                "tugas" => $tugas
            ]);
    }

    public function editDataTugas($mapelId, $tugasId, $guruId, Request $request): Response|RedirectResponse
    {
        if (($request->input('judul') == null) || ($request->input('deskripsi') == null)) {
            Alert::error('Gagal', 'Pastikan judul dan deskripsi terisi');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'dokumen.*' => 'mimes:pdf,xls,xlsx,doc,docx,jpg,png,jpeg'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan format dokumen sesuai dengan ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'deadline' => $request->input('deadline'),
            'dokumen' => $request->file('dokumen'),
        ];

        try {
            $this->tugasService->edit($tugasId, $data);

            Alert::success('Sukses', 'Berhasil Mengubah Data Materi');

            return redirect()->route('course-guru-assignment', ['mapelId' => $mapelId, 'guruId' => $guruId]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Pastikan data deskripsi tidak dimasukkan gambar ataupun dokumen');
            return redirect()->back();
        }
    }

    public function delete($mapelId, $tugasId, $guruId): Response|RedirectResponse
    {
        $this->tugasService->delete($tugasId);
        Alert::success('Sukses', 'Berhasil Menghapus Data Tugas');
        return redirect()->route('course-guru-assignment', ['mapelId' => $mapelId, 'guruId' => $guruId]);
    }

    public function pengerjaanDetail($mapelId, $tugasId, $pengerjaanTugasId, $guruId): Response|RedirectResponse
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $tugas = $this->tugasService->getDetail($tugasId);
        $tugasDetail = $this->tugasService->getAssignDetail($pengerjaanTugasId);

        return response()
            ->view("guru.tugas.penilaian", [
                "title" => "Pengerjaan Tugas " . $mapel["nama_mapel"] . " " . $tugasDetail["siswa"]->nama,
                "guru" => $guru,
                "mapel" => $mapel,
                "tugas" => $tugas,
                "tugasDetail" => $tugasDetail,
            ]);
    }

    public function addNilaiSiswa($mapelId, $tugasId, $pengerjaanTugasId, $guruId, Request $request):Response|RedirectResponse
    {
        if (($request->input('nilai') == null)) {
            Alert::error('Gagal', 'Pastikan nilai terisi');
            return redirect()->back();
        }

        $data = [
            'nilai' => $request->input('nilai')
        ];

        $this->tugasService->addNilai($pengerjaanTugasId, $data);

        Alert::success('Sukses', 'Berhasil Mengunggah Nilai Tugas');

        return redirect()->route('detail-guru-assignment',  ['mapelId' => $mapelId, 'tugasId' => $tugasId, 'guruId' => $guruId]);
    }

}
