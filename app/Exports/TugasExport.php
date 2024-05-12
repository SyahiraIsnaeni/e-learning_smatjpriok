<?php

namespace App\Exports;

use App\Models\PengerjaanTugas;
use App\Models\Tugas;
use Maatwebsite\Excel\Concerns\FromCollection;

class TugasExport implements FromCollection
{
    private $tugasId;

    public function __construct(int $tugasId)
    {
        $this->tugasId = $tugasId;
    }

    public function collection()
    {
        $header = ['Nama Siswa', 'Nilai'];
        $pengerjaanTugas = PengerjaanTugas::where('tugas_id', $this->tugasId)
            ->with('siswa')
            ->get();

        return collect([$header])->concat($pengerjaanTugas->map(function (PengerjaanTugas $pengerjaanTugas) {
            return [
                'nama_siswa' => $pengerjaanTugas->siswa->nama,
                'nilai' => $pengerjaanTugas->nilai ?? 0,
            ];
        }));
    }
}
