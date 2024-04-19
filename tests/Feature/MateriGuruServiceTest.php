<?php

namespace Tests\Feature;

use App\Models\Materi;
use App\Services\MateriGuruService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MateriGuruServiceTest extends TestCase
{
    protected $materiService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->materiService = app(MateriGuruService::class);
    }

    public function testGetMateriByMapelId()
    {
        $mapelId = 1;

        $materi = $this->materiService->get($mapelId);

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $materi);

        $this->assertEquals($materi->pluck('created_at')->sortDesc()->values()->all(), $materi->pluck('created_at')->values()->all());
    }

    public function testAddMateri()
    {
        $mapelId = 1;
        $data = [
            'judul' => 'Materi Baru',
            'deskripsi' => 'Deskripsi Materi Baru',
            'gambar' => UploadedFile::fake()->image('gambar.jpg'),
            'dokumen' => [UploadedFile::fake()->create('dokumen1.pdf'), UploadedFile::fake()->create('dokumen2.pdf')]
        ];

        $materi = $this->materiService->add($mapelId, $data);

        $this->assertDatabaseHas('materis', [
            'id' => $materi->id,
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'],
            'mapel_id' => $mapelId
        ]);
    }

    public function testEditMateri()
    {
        $data = [
            'judul' => 'Judul Materi Diubah',
            'deskripsi' => 'Deskripsi Materi Diubah',
            'gambar' => UploadedFile::fake()->image('gambar2.jpg'),
            'dokumen' => [UploadedFile::fake()->create('dokumen3.pdf'), UploadedFile::fake()->create('dokumen4.pdf')]
        ];

        $materi = $this->materiService->edit(2, $data);

        $this->assertEquals($data['judul'], $materi->judul);
        $this->assertEquals($data['deskripsi'], $materi->deskripsi);
    }

    public function testDeleteMateri()
    {
        $this->materiService->delete(2);

        $materi = Materi::find(2);
        $this->assertNull($materi);
    }
}
