<?php

namespace App\Services\Impl;

use App\Models\DokumenMateri;
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

    public function getDetail($materiId)
    {
        return Materi::where('id', $materiId)->first();
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

        $materi->save();

        if (isset($data['dokumen'])) {
            foreach ($data['dokumen'] as $doc) {
                $originalName = $doc->getClientOriginalName();
                $extension = $doc->getClientOriginalExtension();
                $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_') . '_' . time() . '.' . $extension;
                $dokumenPath = $doc->storeAs('public/materi/dokumen', $namaFile);
                $dokumenMateri = new DokumenMateri();
                $dokumenMateri->dokumen = $namaFile;
                $dokumenMateri->materi_id = $materi->id;
                $dokumenMateri->save();
            }
        }

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
            foreach ($materi->dokumen as $doc) {
                if (!in_array($doc->dokumen, $data['dokumen'])) {
                    Storage::delete('public/materi/dokumen/' . $doc->image);
                    $doc->delete();
                }
            }

            foreach ($data['dokumen'] as $doc) {
                $originalName = $doc->getClientOriginalName();
                $extension = $doc->getClientOriginalExtension();
                $namaFile = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_') . '_' . time() . '.' . $extension;
                $imagePath = $doc->storeAs('public/materi/dokumen', $namaFile);
                $dokumenMateri = new DokumenMateri();
                $dokumenMateri->dokumen = $namaFile;
                $dokumenMateri->materi_id = $materi->id;
                $dokumenMateri->save();
            }
        }

        $materi->save();

        return $materi;
    }

    public function delete($materiId)
    {
        $materi = Materi::findOrFail($materiId);
        foreach ($materi->dokumen as $doc) {
            Storage::delete('public/materi/dokumen/' . $doc->dokumen);
            $doc->delete();
        }

        $materi->materiSiswa()->delete();

        Storage::delete('public/materi/gambar/' . $materi->gambar);

        $materi->delete();
    }
}
