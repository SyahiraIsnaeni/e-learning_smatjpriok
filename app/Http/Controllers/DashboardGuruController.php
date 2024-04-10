<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardGuruController extends Controller
{
    public function index($id): Response
    {
        $guru = Guru::findOrFail($id);
        return response()
            ->view("guru.dashboard", [
                "title" => "Dashboard Guru E-Learning SMA Tanjung Priok"
            ]);
    }
}
