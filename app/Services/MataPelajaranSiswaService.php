<?php

namespace App\Services;

interface MataPelajaranSiswaService
{
    public function getMapel($siswaId);

    public function countTaskSiswa1($studentId);

    public function countTaskSiswa2($studentId);

    public function firstTugas($studentId);

    public function firstUjian($studentId);

    public function firstMateri($studentId);
}
