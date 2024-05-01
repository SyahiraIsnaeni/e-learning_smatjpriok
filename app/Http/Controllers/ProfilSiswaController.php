<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Services\SiswaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilSiswaController extends Controller
{

    protected $siswaService;

    public function __construct(SiswaService $siswaService)
    {
        $this->siswaService = $siswaService;
    }

    public function index($id): Response
    {
        $siswa = Siswa::findOrFail($id);
        return response()
            ->view("siswa.profil", [
                "title" => "Profil Siswa E-Learning SMA Tanjung Priok",
                "siswa" => $siswa,
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

            $this->siswaService->edit($id, $data);

            Alert::success('Sukses', 'Berhasil menyimpan data profil siswa');

            return redirect()->route('profile-siswa', ["id" => $id]);
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                Alert::error('Gagal', 'Pastikan email tidak pernah digunakan di sistem ini');
            } else {
                Alert::error('Gagal', 'Terjadi kesalahan saat mengedit data profil siswa');
            }

            return redirect()->back();
        }
    }
}
