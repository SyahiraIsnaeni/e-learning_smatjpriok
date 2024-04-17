<?php

namespace Tests\Feature;

use App\Services\MataPelajaranDetailGuruService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseDetailGuruControllerTest extends TestCase
{
    public function testIndexRoute()
    {
        $userData = [
            'emailNip' => '213',
            'password' => '213',
        ];

        $this->post(route('login-guru'), $userData);

        $response = $this->get(route('course-guru-detail', ['mapelId' => 1, 'guruId' => 2]));

        $response->assertStatus(200);

        $response->assertViewIs('guru.courses-detail');

        $guru = $response->viewData('guru');

        $this->assertEquals('Guru 2', $guru->nama);

        $response->assertViewHas('mapel', ['nama_kelas' => "XII IPA 2", 'nama_mapel' => "Matematika"]);
    }
}
