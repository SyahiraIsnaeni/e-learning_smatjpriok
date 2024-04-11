<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginSiswaControllerTest extends TestCase
{
    public function testLoginView()
    {
        $response = $this->get(route('login-siswa'));

        $response->assertStatus(200);
        $response->assertViewIs('siswa.login');
    }

    public function testDoLoginWithInvalidCredentials()
    {
        $response = $this->post(route('login-siswa'), [
            'emailNip' => 'invalid@example.com',
            'password' => 'invalidpassword'
        ]);

        $response->assertViewIs("siswa.login");
    }

    public function testDoLoginWithValidCredentials()
    {
        $response = $this->post(route('login-siswa'), [
            'emailNis' => 'siswa1@gmail.com',
            'password' => '2113'
        ]);

        $response->assertRedirect('/dashboard/siswa/8');
    }

    public function testLogout()
    {
        $response = $this->post(route('logout-siswa'));

        $response->assertRedirect('/');
    }
}
