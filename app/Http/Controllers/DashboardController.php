<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $kelas = class_exists(\App\Models\Kelas::class)
            ? \App\Models\Kelas::all()
            : collect();

        $siswa = class_exists(\App\Models\Siswa::class)
            ? \App\Models\Siswa::all()
            : collect();

        $daftar_ulang = class_exists(\App\Models\DaftarUlang::class)
            ? \App\Models\DaftarUlang::all()
            : collect();

        // Fitur lama yang tidak dipakai, dibuat kosong agar dashboard tidak error
        $galeri = collect();
        $posts = collect();

        $aspek = 0;
        $kriteria = 0;
        $penilaian = 0;

        // Hasil akhir dihitung dari siswa yang sudah punya total nilai
        $hasilAkhir = class_exists(\App\Models\Siswa::class)
            ? \App\Models\Siswa::whereNotNull('total_nilai')->count()
            : 0;

        // Alumni hanya dihitung kalau kolom status_kelulusan memang ada
        $siswaAlumni = 0;

        if (
            class_exists(\App\Models\Siswa::class) &&
            Schema::hasTable('siswas') &&
            Schema::hasColumn('siswas', 'status_kelulusan')
        ) {
            $siswaAlumni = \App\Models\Siswa::where('status_kelulusan', true)->count();
        }

        return view('home.index', compact(
            'kelas',
            'siswa',
            'daftar_ulang',
            'galeri',
            'posts',
            'aspek',
            'kriteria',
            'penilaian',
            'hasilAkhir',
            'siswaAlumni'
        ));
    }
}