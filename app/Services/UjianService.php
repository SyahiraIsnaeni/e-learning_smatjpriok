<?php

namespace App\Services;

interface UjianService
{

    public function get($mapelId);

    public function getDetail($ujianId);

    public function getDetailPertanyaan($ujianId);

    public function alreadySubmit($ujianId);

    public function addPilihanGanda($mapelId, array $data);

    public function addEssai($mapelId, array $data);

    public function editPilihanGanda($ujianId);

    public function editEssai($ujianId, array $data);

    public function delete($ujianId);

}
