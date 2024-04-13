<?php

namespace Tests\Feature;

use App\Models\MataPelajaran;
use App\Services\GuruService;
use App\Services\MataPelajaranGuruService;
use Tests\TestCase;

class MataPelajaranServiceTest extends TestCase
{
    protected $mapelService;

    public function setUp(): void
    {
        parent::setUp();
        $this->mapelService = app(MataPelajaranGuruService::class);
    }

    public function testGetMapelForGivenGuruId()
    {

        $mapels = $this->mapelService->getMapel(1);

        $this->assertCount(2, $mapels);
        $this->assertEquals('Bahasa Indonesia', $mapels[0]['nama_mapel']);
        $this->assertEquals('XII IPA 2', $mapels[0]['nama_kelas']);
        $this->assertEquals('Bahasa Indonesia', $mapels[1]['nama_mapel']);
        $this->assertEquals('XII IPA 1', $mapels[1]['nama_kelas']);
    }
}
