<?php

namespace App\Http\Controllers;

use App\Services\SiswaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class LoginSiswaController extends Controller
{
    protected $siswaService;

    public function __construct(SiswaService $siswaService)
    {
        $this->siswaService = $siswaService;
    }

    public function login(): Response
    {
        return response()
            ->view("siswa.login", [
                "title" => "Login Siswa E-Learning SMA Tanjung Priok"
            ]);
    }

    public function doLogin(Request $request): Response|RedirectResponse
    {
        $emailNis = $request->input('emailNis');
        $password = $request->input('password');

        if (empty($emailNis) || empty($password)) {
            return response()->view("siswa.login", [
                "title" => "Login Siswa E-Learning SMA Tanjung Priok",
                "error" => "Email/NIS or password is required!"
            ]);
        }

        if ($this->siswaService->login($emailNis, $password)) {
            $id = $this->siswaService->getStudentById($emailNis);
            $request->session()->put("siswa", $id);
            $request->session()->put('last_activity', now());
            return redirect("/dashboard/siswa/" . $id);
        }

        return response()->view("siswa.login", [
            "title" => "Login Siswa E-Learning SMA Tanjung Priok",
            "error" => "Email/NIS or password is wrong!"
        ]);
    }

    public function logout(Request $request): RedirectResponse{
        $request->session()->flush();

        $request->session()->regenerate(true);

        return redirect('/');
    }
}
