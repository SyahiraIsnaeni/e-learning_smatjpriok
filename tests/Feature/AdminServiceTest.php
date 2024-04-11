<?php

namespace Tests\Feature;

use App\Services\AdminService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminServiceTest extends TestCase
{
    protected $adminService;

    public function setUp(): void
    {
        parent::setUp();
        $this->adminService = app(AdminService::class);
    }

    public function testLoginWithValidCredentials()
    {
        $result = $this->adminService->login("Smatanjungpriok2@gmail.com", "PATSMA2020");

        $this->assertTrue($result);
    }

    public function testLoginWithInvalidCredentials()
    {
        $result = $this->adminService->login("210", 'PATSMA2020');

        $this->assertFalse($result);
    }
}
