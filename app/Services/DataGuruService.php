<?php

namespace App\Services;

interface DataGuruService
{

    public function get();

    public function edit($id, array $data);

}
