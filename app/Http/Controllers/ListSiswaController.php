<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Services\DataGuruService;
use App\Services\DataSiswaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class ListSiswaController extends Controller
{
    protected $dataSiswaService;

    public function __construct(DataSiswaService $dataSiswaService)
    {
        $this->dataSiswaService = $dataSiswaService;
    }

    public function kelas():Response
    {
        $kelas= $this->dataSiswaService->getKelas();
        return response()
            ->view("admin.siswa.view", [
                "title" => "Data Kelas E-Learning SMA Tanjung Priok",
                "kelas" => $kelas,
            ]);
    }

    public function siswa($kelasId):Response
    {
        $siswa = $this->dataSiswaService->getSiswa($kelasId);
        return response()
            ->view("admin.siswa.detail", [
                "title" => "Data Siswa E-Learning SMA Tanjung Priok",
                "siswa" => $siswa,
            ]);
    }

    public function edit($id):Response
    {
        $siswa = Siswa::findOrFail($id);
        return response()
            ->view("admin.siswa.edit", [
                "title" => "Edit Data Siswa E-Learning SMA Tanjung Priok",
                "siswa" => $siswa,
            ]);
    }

    public function editData($id, Request $request):Response | RedirectResponse
    {
        $siswa = Siswa::findOrFail($id);
        if (($request->input('password') == null) || ($request->input('konfirmasiPassword') == null)) {
            Alert::error('Gagal', 'Pastikan data password dan konfirmasi password tidak kosong');
            return redirect()->back();
        }

        if (($request->input('password') != $request->input('konfirmasiPassword'))) {
            Alert::error('Gagal', 'Pastikan data password dan konfirmasi password sama');
            return redirect()->back();
        }

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        try {
            $this->dataSiswaService->edit($id, $data);
            Alert::success('Sukses', 'Berhasil Mengubah Data Siswa');
            return redirect()->route('data-siswa', ["kelasId" => $siswa->kelas->id]);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data siswa. Pastikan email tidak sama dengan data lainnya');
            return redirect()->back();
        }
    }
}
