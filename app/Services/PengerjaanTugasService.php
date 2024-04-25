<?php

namespace App\Services;

interface PengerjaanTugasService
{

    public function get($mapelId, $studentId);

    public function getDetail($pengerjaanTugasId, $siswaId);

    public function addAssignment($tugasId, $siswaId, array $data);

    public function resetData($tugasId, $siswaId);

}
