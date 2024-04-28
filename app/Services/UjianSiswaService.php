<?php

namespace App\Services;

interface UjianSiswaService
{
    public function get($mapelId);

    public function getDetail($ujianId);

    public function assignExam($ujianId);
}
