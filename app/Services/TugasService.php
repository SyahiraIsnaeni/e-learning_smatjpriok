<?php

namespace App\Services;

interface TugasService
{
    public function get($mapelId);

    public function getDetail($tugasId);

    public function add($mapelId, array $data);

    public function edit($tugasId, array $data);

    public function delete($tugasId);

    public function addNilai($pengerjaanId, array $data);

    public function alreadySubmit($pengerjaanId);

    public function getAssignDetail($pengerjaanId);

    public function nilai($tugasId);
}
