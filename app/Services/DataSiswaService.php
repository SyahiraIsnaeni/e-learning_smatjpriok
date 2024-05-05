<?php

namespace App\Services;

interface DataSiswaService
{
    public function getKelas();

    public function getSiswa($kelasId);

    public function edit($id, array $data);
}
