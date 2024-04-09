<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardSiswaController extends Controller
{
    public function index(): Response
    {
        return response()
            ->view("siswa.dashboard", [
                "title" => "Dashboard Siswa E-Learning SMA Tanjung Priok"
            ]);
    }
}
