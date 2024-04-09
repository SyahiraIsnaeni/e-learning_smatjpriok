<?php

namespace App\Http\Controllers;

use App\Services\GuruService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginGuruController extends Controller
{
    protected $guruService;

    public function __construct(GuruService $guruService)
    {
        $this->guruService = $guruService;
    }

    public function login(): Response
    {
        return response()
            ->view("guru.login", [
                "title" => "Login Guru E-Learning SMA Tanjung Priok"
            ]);
    }

    public function doLogin(Request $request): Response|RedirectResponse
    {
        $emailNip = $request->input('emailNip');
        $password = $request->input('password');

        if (empty($emailNip) || empty($password)) {
            return response()->view("guru.login", [
                "title" => "Login Guru E-Learning SMA Tanjung Priok",
                "error" => "Email/NIP or password is required!"
            ]);
        }

        if ($this->guruService->login($emailNip, $password)) {
            $request->session()->put("guru", $emailNip);
            return redirect("/dashboard/guru");
        }

        return response()->view("guru.login", [
            "title" => "Login Guru E-Learning SMA Tanjung Priok",
            "error" => "Email/NIP or password is wrong!"
        ]);
    }

    public function logout(Request $request): RedirectResponse{
        $request->session()->flush();

        $request->session()->regenerate(true);

        return redirect('/login/guru');
    }
}
