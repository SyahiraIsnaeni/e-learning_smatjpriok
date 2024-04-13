<?php

namespace Tests\Feature;

use App\Services\MataPelajaranSiswaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MataPelajaranSiswaServiceTest extends TestCase
{
    protected $mapelService;

    public function setUp(): void
    {
        parent::setUp();
        $this->mapelService = app(MataPelajaranSiswaService::class);
    }
    public function testFormattedMapelsForGivenSiswaId()
    {

        $mapels = $this->mapelService->getMapel(8);

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $mapels);
        $this->assertNotEmpty($mapels);

        foreach ($mapels as $mapel) {
            $this->assertArrayHasKey('nama_mapel', $mapel);
            $this->assertArrayHasKey('nama_guru', $mapel);
            $this->assertArrayHasKey('nama_kelas', $mapel);
        }
    }
}
