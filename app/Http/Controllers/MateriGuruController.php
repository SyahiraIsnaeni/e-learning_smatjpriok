<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Services\Impl\MataPelajaranDetailGuruServiceImpl;
use App\Services\MataPelajaranDetailGuruService;
use App\Services\MateriGuruService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MateriGuruController extends Controller
{
    protected $materiService;
    protected $mapelService;

    public function __construct(MateriGuruService $materiService, MataPelajaranDetailGuruService $mapelService)
    {
        $this->materiService = $materiService;
        $this->mapelService = $mapelService;
    }

    public function materi($mapelId, $guruId): Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $materi = $this->materiService->get($mapelId);
        return response()
            ->view("guru.materi.view", [
                "title" => "Materi " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "guru" => $guru,
                "mapel" => $mapel,
                "materi" => $materi
            ]);
    }

    public function add($mapelId, $guruId): Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $materi = $this->materiService->get($mapelId);
        return response()
            ->view("guru.materi.add", [
                "title" => "Tambah Materi " . $mapel["nama_mapel"] . " " . $mapel["nama_kelas"],
                "judul" => "Tambah Materi " . $mapel["nama_mapel"],
                "guru" => $guru,
                "mapel" => $mapel,
                "materi" => $materi
            ]);
    }

    public function addDataMateri($mapelId, $guruId, Request $request):Response|RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png',
            'dokumen.*' => 'mimes:pdf,xls,xlsx,doc,docx,jpg,png,jpeg'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan Semua Data Terisi dan Sesuai Ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $request->file('gambar'),
            'dokumen' => $request->file('dokumen'),
        ];

        $this->materiService->add($mapelId, $data);

        Alert::success('Sukses', 'Berhasil Menambah Data Materi');

        return redirect()->route('course-guru-material',  ['mapelId' => $mapelId, 'guruId' => $guruId]);
    }

    public function detailMateri($mapelId, $materiId, $guruId):Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $materi = $this->materiService->getDetail($materiId);
        return response()
            ->view("guru.materi.detail", [
                "title" => "Materi " . $materi->judul,
                "guru" => $guru,
                "mapel" => $mapel,
                "materi" => $materi
            ]);
    }

    public function edit($mapelId, $materiId, $guruId):Response
    {
        $guru = Guru::findOrFail($guruId);
        $mapel = $this->mapelService->getMapelDetail($mapelId);
        $materi = $this->materiService->getDetail($materiId);
        return response()
            ->view("guru.materi.edit", [
                "title" => "Edit Materi " . $materi->judul,
                "guru" => $guru,
                "mapel" => $mapel,
                "materi" => $materi
            ]);
    }

    public function editDataMateri($mapelId, $materiId, $guruId, Request $request): Response|RedirectResponse
    {
        if (($request->input('judul') == null) || ($request->input('deskripsi') == null)) {
            Alert::error('Gagal', 'Pastikan judul dan deskripsi terisi');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'gambar' => 'image|mimes:jpeg,jpg,png',
            'dokumen.*' => 'mimes:pdf,xls,xlsx,doc,docx,jpg,png,jpeg'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan format gambar dan dokumen sesuai dengan ketentuan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $request->file('gambar'),
            'dokumen' => $request->file('dokumen'),
        ];

        try {
            // Panggil metode edit Materi
            $this->materiService->edit($materiId, $data);

            Alert::success('Sukses', 'Berhasil Mengubah Data Materi');

            return redirect()->route('course-guru-material', ['mapelId' => $mapelId, 'guruId' => $guruId]);
        } catch (\Exception $e) {
            // Tangkap pengecualian jika deskripsi mengandung gambar atau dokumen
            Alert::error('Gagal', 'Pastikan data deskripsi tidak dimasukkan gambar ataupun dokumen');
            return redirect()->back();
        }
    }

    public function delete($mapelId, $materiId, $guruId): Response|RedirectResponse
    {
        $this->materiService->delete($materiId);
        Alert::success('Sukses', 'Berhasil Menghapus Data Materi');
        return redirect()->route('course-guru-material', ['mapelId' => $mapelId, 'guruId' => $guruId]);
    }
}
