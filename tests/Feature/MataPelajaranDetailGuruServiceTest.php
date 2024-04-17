<?php

namespace Tests\Feature;

use App\Services\MataPelajaranDetailGuruService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MataPelajaranDetailGuruServiceTest extends TestCase
{
    protected $mapelService;

    public function setUp(): void
    {
        parent::setUp();
        $this->mapelService = app(MataPelajaranDetailGuruService::class);
    }

    public function testGetMapelDetail()
    {
        $result = $this->mapelService->getMapelDetail(3);

        $this->assertEquals([
            'nama_kelas' => "XII IPA 1",
            'nama_mapel' => "Fisika",
        ], $result);
    }
}
