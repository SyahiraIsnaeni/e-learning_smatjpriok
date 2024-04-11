<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardAdminController extends Controller
{
    public function index(): Response
    {
        return response()
            ->view("admin.dashboard", [
                "title" => "Dashboard Admin E-Learning SMA Tanjung Priok"
            ]);
    }
}
