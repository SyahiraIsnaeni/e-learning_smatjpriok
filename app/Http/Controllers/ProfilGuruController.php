<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Services\GuruService;
use App\Services\SiswaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilGuruController extends Controller
{
    protected $guruService;

    public function __construct(GuruService $guruService)
    {
        $this->guruService = $guruService;
    }

    public function index($id): Response
    {
        $guru = Guru::findOrFail($id);
        return response()
            ->view("guru.profil", [
                "title" => "Profil Guru E-Learning SMA Tanjung Priok",
                "guru" => $guru,
            ]);
    }

    public function editData($id, Request $request)
    {
        try {
            if (($request->input('password') == null) || ($request->input('konfirmasiPassword') == null)) {
                Alert::error('Gagal', 'Pastikan password dan konfirmasi password tidak kosong');
                return redirect()->back();
            }

            if ($request->input('password') != $request->input('konfirmasiPassword')){
                Alert::error('Gagal', 'Pastikan konfirmasi password sesuai dengan password yang disertakan');
                return redirect()->back();
            }

            $data = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];

            $this->guruService->edit($id, $data);

            Alert::success('Sukses', 'Berhasil menyimpan data profil guru');

            return redirect()->route('profile-guru', ["id" => $id]);
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                Alert::error('Gagal', 'Pastikan email tidak pernah digunakan di sistem ini');
            } else {
                Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data profil guru');
            }

            return redirect()->back();
        }
    }
}
