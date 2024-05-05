<?php

namespace App\Http\Controllers;

use App\Models\DokumenMateri;
use App\Models\DokumenTugas;
use App\Models\DokumenTugasSiswa;
use App\Models\Guru;
use App\Models\JawabanSiswaUjian;
use App\Models\Materi;
use App\Models\MateriSiswa;
use App\Models\OpsiJawabanUjian;
use App\Models\PengerjaanTugas;
use App\Models\PengerjaanUjianSiswa;
use App\Models\PertanyaanUjian;
use App\Models\Tugas;
use App\Models\Ujian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardAdminController extends Controller
{
    public function index(): Response
    {
        return response()
            ->view("admin.dashboard", [
                "title" => "Dashboard Admin E-Learning SMA Tanjung Priok"
            ]);
    }

    public function deleteAllData(): Response | RedirectResponse
    {
        try {
            MateriSiswa::truncate();

            DokumenMateri::truncate();

            DB::table('materis')->delete();

            Storage::deleteDirectory('public/materi/dokumen');

            Storage::deleteDirectory('public/materi/gambar');

            DokumenTugasSiswa::truncate();

            Storage::deleteDirectory('public/tugas/siswa/dokumen');

            DB::table('pengerjaan_tugas')->delete();

            DokumenTugas::truncate();

            Storage::deleteDirectory('public/tugas/dokumen');

            DB::table('tugas')->delete();

            JawabanSiswaUjian::truncate();

            DB::table('pengerjaan_ujian_siswas')->delete();

            DB::table('opsi_jawaban_ujians')->delete();

            DB::table('pertanyaan_ujians')->delete();

            DB::table('ujians')->delete();

            Alert::success('Sukses', 'Berhasil Delete Semua Data E-Learning');
            return redirect()->route('dashboard-admin');
        }catch (\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus semua data');
            return redirect()->back();
        }

    }
}
