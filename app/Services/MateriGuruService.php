<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface MateriGuruService
{
    public function get($mapelId): ?Collection;

    public function getDetail($materiId);

    public function add($mapelId, array $data);

    public function edit($materiId, array $data);

    public function delete($materiId);
}
