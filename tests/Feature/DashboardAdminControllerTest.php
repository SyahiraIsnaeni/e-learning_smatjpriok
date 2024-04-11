<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardAdminControllerTest extends TestCase
{
    public function testLoginView()
    {
        $response = $this->get(route('login-admin'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.login');
    }

    public function testDoLoginWithInvalidCredentials()
    {
        $response = $this->post(route('login-admin'), [
            'email' => 'invalid@example.com',
            'password' => 'invalidpassword'
        ]);

        $response->assertViewIs("admin.login");
    }

    public function testDoLoginWithValidCredentials()
    {
        $response = $this->post(route('login-admin'), [
            'email' => 'Smatanjungpriok2@gmail.com',
            'password' => 'PATSMA2020'
        ]);

        $response->assertRedirect('/dashboard/admin');
    }

    public function testLogout()
    {
        $response = $this->post(route('logout-admin'));

        $response->assertRedirect('/login/admin');
    }
}
