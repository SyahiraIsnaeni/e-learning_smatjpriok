<?php

namespace Tests\Feature;

use App\Models\PengerjaanUjianSiswa;
use App\Models\Siswa;
use App\Models\Ujian;
use App\Services\Impl\UjianServiceImpl;
use App\Services\MataPelajaranDetailGuruService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UjianServiceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->mapelService = app(MataPelajaranDetailGuruService::class);
        $this->ujianModel = app(Ujian::class);
        $this->pengerjaanUjianSiswaModel = app(PengerjaanUjianSiswa::class);
        $this->siswaModel = app(Siswa::class);
    }

    public function testAddEssai()
    {
        $mapelId = 1; // Nilai mapelId yang disediakan untuk pengujian
        $data = [
            'judul' => 'Ujian Essai',
            'deskripsi' => 'Deskripsi Ujian',
            'deadline' => '2024-04-30 12:00:00',
            'durasi' => '02:00:00',
            'pertanyaan' => [
                ['pertanyaan' => 'Pertanyaan 1', 'nomor' => 'Soal 1'],
                ['pertanyaan' => 'Pertanyaan 2', 'nomor' => 'Soal 2'],
            ],
        ];

        // Memanggil metode addEssai dari UjianService
        $ujianService = new UjianServiceImpl($this->ujianModel, $this->siswaModel, $this->pengerjaanUjianSiswaModel);
        $ujian = $ujianService->addEssai($mapelId, $data);

        // Mengambil data ujian yang baru saja dibuat dari database
        $ujianBaru = Ujian::where('judul', 'Ujian Essai')->first();

        // Assert
        $this->assertInstanceOf(Ujian::class, $ujian);
        $this->assertEquals('Ujian Essai', $ujian->judul);
        $this->assertEquals('Deskripsi Ujian', $ujian->deskripsi);
        $this->assertEquals('2024-04-30 12:00:00', $ujian->deadline);
        $this->assertEquals('02:00:00', $ujian->durasi);
        $this->assertEquals('essai', $ujian->tipe);
        $this->assertEquals($mapelId, $ujian->mapel_id);

        // Memastikan setiap siswa yang terkait dengan mata pelajaran memiliki pengerjaan ujian
        $siswa = $this->siswaModel->whereHas('kelas.mapel', function ($query) use ($mapelId) {
            $query->where('id', $mapelId);
        })->get();

        foreach ($siswa as $student) {
            $this->assertDatabaseHas('pengerjaan_ujian_siswas', ['ujian_id' => $ujianBaru->id, 'siswa_id' => $student->id]);
        }

        // Memeriksa apakah pertanyaan ujian telah disimpan dengan benar
        foreach ($data['pertanyaan'] as $pertanyaan) {
            $this->assertDatabaseHas('pertanyaan_ujians', ['pertanyaan' => $pertanyaan['pertanyaan'], 'nomor' => $pertanyaan['nomor'], 'ujian_id' => $ujianBaru->id]);
        }
    }

}
