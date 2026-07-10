<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RekapController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('kelas')->get();

        $totalPendaftar = $siswas->count();

        $totalDiterima = $siswas->where('status', 'Diterima')->count();
        $totalTidakDiterima = $siswas->where('status', 'Tidak Diterima')->count();
        $totalMenunggu = $siswas->where('status', 'Menunggu Konfirmasi')->count();
        $totalPerbaikiData = $siswas->where('status', 'Perbaiki Data')->count();
        $totalPerbaikiDokumen = $siswas->where('status', 'Perbaiki Dokumen')->count();

        $totalBelumDiproses = $siswas->whereNull('total_nilai')->count();
        $totalSudahDiproses = $siswas->whereNotNull('total_nilai')->count();

        $totalDokumen = $this->countDistinct([
            'dokumen_siswas',
            'dokumen_siswa',
            'dokumen_siswa_pindahans',
            'dokumen_siswa_pindahan',
            'berkas',
        ]);

        $totalTesQuran = $this->countDistinct([
            'quran_tes',
            'quran_tests',
            'tes_quran',
        ]);

        $totalWawancara = $this->countDistinct([
            'interview_tests',
            'interviews',
            'wawancaras',
            'wawancara',
        ]);

        $totalPembayaran = $this->countDistinct([
            'pembayarans',
            'pembayaran',
            'daftar_ulangs',
            'daftar_ulang',
        ]);

        $rekapJurusan = $siswas
            ->groupBy(function ($siswa) {
                return $siswa->kelas->nama_jurusan ?? 'Belum Memilih Jurusan';
            })
            ->map(function ($items) {
                return $items->count();
            });

        return view('home.admin.rekapan.index', compact(
            'totalPendaftar',
            'totalDiterima',
            'totalTidakDiterima',
            'totalMenunggu',
            'totalPerbaikiData',
            'totalPerbaikiDokumen',
            'totalBelumDiproses',
            'totalSudahDiproses',
            'totalDokumen',
            'totalTesQuran',
            'totalWawancara',
            'totalPembayaran',
            'rekapJurusan'
        ));
    }

    public function update()
    {
        return redirect()
            ->route('admin.rekapan.index')
            ->with('success', 'Data rekapan diperbarui secara otomatis berdasarkan data terbaru.');
    }

    public function print()
    {
        return $this->index();
    }

    private function countDistinct(array $tables)
    {
        foreach ($tables as $table) {
            if (!Schema::hasTable($table)) {
                continue;
            }

            if (Schema::hasColumn($table, 'user_id')) {
                return DB::table($table)
                    ->whereNotNull('user_id')
                    ->distinct()
                    ->count('user_id');
            }

            if (Schema::hasColumn($table, 'siswa_id')) {
                return DB::table($table)
                    ->whereNotNull('siswa_id')
                    ->distinct()
                    ->count('siswa_id');
            }

            return DB::table($table)->count();
        }

        return 0;
    }
}