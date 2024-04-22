<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface MateriSiswaService
{
    public function get($mapelId, $siswaId): ?Collection;

    public function getDetail($materiId, $siswaId);

    public function markAsRead($materiId, $siswaId, array $data);

}
