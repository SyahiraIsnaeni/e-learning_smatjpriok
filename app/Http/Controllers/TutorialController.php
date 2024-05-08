<?php

namespace App\Http\Controllers;

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

    public function guru():Response
    {
        return response()
            ->view("guru.tutorial", [
                "title" => "Tutorial Guru E-Learning SMA Tanjung Priok"
            ]);
    }

    public function siswa():Response
    {
        return response()
            ->view("siswa.tutorial", [
                "title" => "Tutorial Siswa E-Learning SMA Tanjung Priok"
            ]);
    }
}
