<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class LoginAdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function login(): Response
    {
        return response()
            ->view("admin.login", [
                "title" => "Login Admin E-Learning SMA Tanjung Priok"
            ]);
    }

    public function doLogin(Request $request): Response|RedirectResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (empty($email) || empty($password)) {
            return response()->view("admin.login", [
                "title" => "Login Admin E-Learning SMA Tanjung Priok",
                "error" => "Email or password is required!"
            ]);
        }

        if ($this->adminService->login($email, $password)) {
            $request->session()->put("admin", $email);
            $request->session()->put('last_activity', now());
            return redirect("/dashboard/admin");
        }

        return response()->view("admin.login", [
            "title" => "Login Admin E-Learning SMA Tanjung Priok",
            "error" => "Email or password is wrong!"
        ]);
    }

    public function logout(Request $request): RedirectResponse{
        $request->session()->flush();

        $request->session()->regenerate(true);

        return redirect('/login/admin');
    }
}
