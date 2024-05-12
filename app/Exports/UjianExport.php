<?php

namespace App\Exports;

use App\Models\PengerjaanUjianSiswa;
use App\Models\Ujian;
use Maatwebsite\Excel\Concerns\FromCollection;

class UjianExport implements FromCollection
{
    private $ujianId;

    public function __construct(int $ujianId)
    {
        $this->ujianId = $ujianId;
    }

    public function collection()
    {
        $header = ['Nama Siswa', 'Nilai'];
        $pengerjaanUjian = PengerjaanUjianSiswa::where('ujian_id', $this->ujianId)
            ->with('siswa')
            ->get();

        return collect([$header])->concat($pengerjaanUjian->map(function (PengerjaanUjianSiswa $pengerjaanUjian) {
            return [
                'nama_siswa' => $pengerjaanUjian->siswa->nama,
                'nilai' => $pengerjaanUjian->nilai ?? 0,
            ];
        }));
    }
}
