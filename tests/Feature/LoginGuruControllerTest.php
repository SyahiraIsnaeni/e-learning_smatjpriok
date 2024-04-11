<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginGuruControllerTest extends TestCase
{
    public function testLoginView()
    {
        $response = $this->get(route('login-guru'));

        $response->assertStatus(200);
        $response->assertViewIs('guru.login');
    }

    public function testDoLoginWithInvalidCredentials()
    {
        $response = $this->post(route('login-guru'), [
            'emailNip' => 'invalid@example.com',
            'password' => 'invalidpassword'
        ]);

        $response->assertViewIs("guru.login");
    }

    public function testDoLoginWithValidCredentials()
    {
        $response = $this->post(route('login-guru'), [
            'emailNip' => 'staf@gmail.com',
            'password' => '212'
        ]);

        $response->assertRedirect('/dashboard/guru/1');
    }

    public function testLogout()
    {
        $response = $this->post(route('logout-guru'));

        $response->assertRedirect('/login/guru');
    }
}
