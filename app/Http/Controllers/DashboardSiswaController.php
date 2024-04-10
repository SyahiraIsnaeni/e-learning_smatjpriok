<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardSiswaController extends Controller
{
    public function index($id): Response
    {
        $siswa = Siswa::findOrFail($id);
        return response()
            ->view("siswa.dashboard", [
                "title" => "Dashboard Siswa E-Learning SMA Tanjung Priok"
            ]);
    }
}
