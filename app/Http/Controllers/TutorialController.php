<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TutorialController extends Controller
{
    public function admin():Response
    {
        return response()
            ->view("admin.tutorial", [
                "title" => "Tutorial Admin E-Learning SMA Tanjung Priok"
            ]);
    }

    public function guru($id):Response
    {
        $guru = Guru::findOrFail($id);
        return response()
            ->view("guru.tutorial", [
                "title" => "Tutorial Guru E-Learning SMA Tanjung Priok",
                "guru" => $guru
            ]);
    }

    public function siswa($id):Response
    {
        $siswa = Siswa::findOrFail($id);
        return response()
            ->view("siswa.tutorial", [
                "title" => "Tutorial Siswa E-Learning SMA Tanjung Priok",
                "siswa" => $siswa,
            ]);
    }
}
