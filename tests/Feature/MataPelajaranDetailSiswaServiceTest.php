<?php

namespace Tests\Feature;

use App\Services\Impl\MataPelajaranDetailSiswaServiceImpl;
use App\Services\MataPelajaranDetailSiswaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MataPelajaranDetailSiswaServiceTest extends TestCase
{
    protected $mapelService;

    public function setUp(): void
    {
        parent::setUp();
        $this->mapelService = app(MataPelajaranDetailSiswaService::class);
    }

    public function testGetMapel()
    {
        $result = $this->mapelService->getMapelDetail(3);

        $this->assertEquals("Fisika", $result);
    }
}
