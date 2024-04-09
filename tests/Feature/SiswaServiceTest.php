<?php

namespace Tests\Feature;

use App\Models\Siswa;
use App\Services\SiswaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiswaServiceTest extends TestCase
{
    protected $siswaService;

    public function setUp(): void
    {
        parent::setUp();
        $this->siswaService = app(SiswaService::class);
    }

    public function testLoginWithValidCredentials()
    {
        $result = $this->siswaService->login("2113", "2113");

        $this->assertTrue($result);
    }

    public function testLoginWithInvalidCredentials()
    {
        $result = $this->siswaService->login("210", '210');

        $this->assertFalse($result);
    }

    public function testGetStudentWithExistingId()
    {
        $fetchedSiswa = $this->siswaService->getStudent(8);

        $this->assertInstanceOf(Siswa::class, $fetchedSiswa);
        $this->assertEquals(8, $fetchedSiswa->id);
    }

    public function testGetStudentWithNonExistingId()
    {
        $fetchedSiswa = $this->siswaService->getStudent(999);

        $this->assertNull($fetchedSiswa);
    }
}
