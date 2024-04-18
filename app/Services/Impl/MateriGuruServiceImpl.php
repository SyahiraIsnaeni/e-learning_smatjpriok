<?php

namespace App\Services\Impl;

use App\Models\Materi;
use App\Services\MateriGuruService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MateriGuruServiceImpl implements MateriGuruService
{
    public function get($mapelId): ?Collection
    {
        return Materi::where('mapel_id', $mapelId)
            ->orderBy('created_at', 'desc')
            ->get();
    }


    public function add($mapelId, array $data)
    {
        $materi = new Materi();
        $materi->judul = $data['judul'];
        $materi->deskripsi = $data['deskripsi'];
        $materi->mapel_id = $mapelId;

        if (isset($data['gambar'])) {
            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $data['gambar']->getClientOriginalExtension();
            $namaFile = Str::slug($namaFile, '_') . '_' . time() . '.' . $extension;
            $gambarPath = $data['gambar']->storeAs('public/materi/gambar', $namaFile);
            $materi->gambar = $namaFile;
        }

        if (isset($data['dokumen'])) {
            $originalName = $data['dokumen']->getClientOriginalName();
            $namaFile = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $data['dokumen']->getClientOriginalExtension();
            $namaFile = Str::slug($namaFile, '_') . '_' . time() . '.' . $extension;
            $dokumenPath = $data['dokumen']->storeAs('public/materi/dokumen', $namaFile);
            $materi->dokumen = $namaFile;
        }

        $materi->save();

        return $materi;
    }

    public function edit($materiId, array $data)
    {
        $materi = Materi::findOrFail($materiId);
        $materi->judul = $data['judul'];
        $materi->deskripsi = $data['deskripsi'];

        if (isset($data['gambar'])) {
            if ($materi->gambar) {
                Storage::delete('public/materi/gambar/' . $materi->gambar);
            }

            $originalName = $data['gambar']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $extension = $data['gambar']->getClientOriginalExtension();
            $namaFile = $namaFile . '_' . time() . '.' . $extension;
            $gambarPath = $data['gambar']->storeAs('public/materi/gambar', $namaFile);
            $materi->gambar = $namaFile;
        }

        if (isset($data['dokumen'])) {
            if ($materi->dokumen) {
                Storage::delete('public/materi/dokumen/' . $materi->dokumen);
            }

            $originalName = $data['dokumen']->getClientOriginalName();
            $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_');
            $extension = $data['dokumen']->getClientOriginalExtension();
            $namaFile = $namaFile . '_' . time() . '.' . $extension;
            $dokumenPath = $data['dokumen']->storeAs('public/materi/dokumen', $namaFile);
            $materi->dokumen = $namaFile;
        }

        $materi->save();

        return $materi;
    }

    public function delete($materiId)
    {
        $materi = Materi::findOrFail($materiId);
        Storage::delete('public/materi/gambar/' . $materi->gambar);
        Storage::delete('public/materi/dokumen/' . $materi->dokumen);
        $materi->delete();
    }
}
