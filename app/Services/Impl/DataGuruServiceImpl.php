<?php

namespace App\Services\Impl;

use App\Models\Guru;
use App\Services\DataGuruService;

class DataGuruServiceImpl implements DataGuruService
{
    public function get()
    {
        $gurus = Guru::orderBy('created_at', 'desc')->get();

        return $gurus;
    }

    public function edit($guruId, array $data)
    {
        $guru = Guru::findOrFail($guruId);

        if ($data["email"] == null){
            $guru->password = bcrypt($data['password']);
        }else{
            $guru->password = bcrypt($data['password']);
            $guru->email = $data['email'];
        }

        $guru->save();

        return $guru;
    }

}
