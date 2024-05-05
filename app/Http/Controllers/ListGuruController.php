<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Services\DataGuruService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ListGuruController extends Controller
{
    protected $dataGuruService;

    public function __construct(DataGuruService $dataGuruService)
    {
        $this->dataGuruService = $dataGuruService;
    }

    public function guru():Response
    {
        $guru = $this->dataGuruService->get();
        return response()
            ->view("admin.guru.view", [
                "title" => "Data Guru E-Learning SMA Tanjung Priok",
                "guru" => $guru,
            ]);
    }

    public function edit($id):Response
    {
        $guru = Guru::findOrFail($id);
        return response()
            ->view("admin.guru.edit", [
                "title" => "Edit Data Guru E-Learning SMA Tanjung Priok",
                "guru" => $guru,
            ]);
    }

    public function editData($id, Request $request):Response | RedirectResponse
    {
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
            $this->dataGuruService->edit($id, $data);
            Alert::success('Sukses', 'Berhasil Mengubah Data Guru');
            return redirect()->route('data-guru');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data guru. Pastikan email tidak sama dengan data lainnya');
            return redirect()->back();
        }
    }
}
