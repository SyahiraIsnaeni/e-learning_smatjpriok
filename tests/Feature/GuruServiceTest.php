<?php

namespace Tests\Feature;

use App\Models\Guru;
use App\Services\GuruService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuruServiceTest extends TestCase
{

    protected $guruService;

    public function setUp(): void
    {
        parent::setUp();
        $this->guruService = app(GuruService::class);
    }

    public function testLoginWithValidCredentials()
    {
        $result = $this->guruService->login("staff@gmail.com", "213");

        $this->assertTrue($result);
    }

    public function testLoginWithInvalidCredentials()
    {
        $result = $this->guruService->login("210", '210');

        $this->assertFalse($result);
    }

    public function testGetTeacherWithExistingId()
    {
        $fetchedGuru = $this->guruService->getTeacher(1);

        $this->assertInstanceOf(Guru::class, $fetchedGuru);
        $this->assertEquals(1, $fetchedGuru->id);
    }

    public function testGetTeacherWithNonExistingId()
    {
        $fetchedGuru = $this->guruService->getTeacher(999);

        $this->assertNull($fetchedGuru);
    }

    public function testGetTeacherByIdSuccessWithEmail()
    {
        $result = $this->guruService->getTeacherById('staff@gmail.com');

        $this->assertEquals(2, $result);
    }

    public function testGetTeacherByIdSuccessWithNip()
    {
        $result = $this->guruService->getTeacherById('213');

        $this->assertEquals(2, $result);
    }

    public function testGetTeacherByIdFailed()
    {
        $result = $this->guruService->getTeacherById('nonexistent@example.com');

        $this->assertNull($result);
    }
}
