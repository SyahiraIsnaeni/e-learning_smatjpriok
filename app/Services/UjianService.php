<?php

namespace App\Services;

interface UjianService
{

    public function get($mapelId);

    public function getDetail($ujianId);

    public function getDetailPertanyaan($ujianId);

    public function alreadySubmit($ujianId);

    public function addEssai($mapelId, array $data);

    public function editEssai($ujianId, array $data);

    public function delete($ujianId);

    public function addPenilaian($ujianId, $pengerjaanId, array $data);

    public function getJawaban($ujianId, $pengerjaanId);

    public function nilai($ujianId);

}
