<?php

namespace App\Services;

interface UjianSiswaService
{
    public function get($mapelId, $studentId);

    public function getDetail($ujianId, $studentId);

    public function beginExam($ujianId, $studentId);

    public function getQuestion($ujianId);

    public function getAnswer($ujianId,$pengerjaanSiswaId, $siswaId, array $data);
}
