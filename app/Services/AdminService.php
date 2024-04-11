<?php

namespace App\Services;

interface AdminService
{
    public function login(string $email, string $password):bool;

}
