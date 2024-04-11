<?php

namespace App\Services\Impl;

use App\Models\Admin;
use App\Services\AdminService;

class AdminServiceImpl implements AdminService
{
    public function login(string $email, string $password): bool
    {
        $admin = Admin::where('email', $email)->first();

        if ($admin && password_verify($password, $admin->password)) {
            return true;
        }

        return false;
    }
}
