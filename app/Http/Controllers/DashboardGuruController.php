<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardGuruController extends Controller
{
    public function index(): Response
    {
        return response()
            ->view("guru.dashboard", [
                "title" => "Dashboard Guru E-Learning SMA Tanjung Priok"
            ]);
    }
}
