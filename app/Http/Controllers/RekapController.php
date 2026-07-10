<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RekapController extends Controller
{
    public function index()
    {
        $data = $this->getRekapData();

        return view('home.admin.rekapan.index', $data);
    }

    public function update()
    {
        return redirect()
            ->route('admin.rekapan.index')
            ->with('success', 'Data rekapan diperbarui otomatis berdasarkan data terbaru.');
    }

    public function print()
    {
        return $this->index();
    }

    public function exportCsv()
    {
        $data = $this->getRekapData();

        $filename = 'rekapan-ppdb-' . date('Y-m-d') . '.xls';

        $html = '
        <html>
        <head>
            <meta charset="UTF-8">
            <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                    font-family: Arial, sans-serif;
                    font-size: 12px;
                }

                th, td {
                    border: 1px solid #999;
                    padding: 8px;
                }

                th {
                    background-color: #d9eaf7;
                    font-weight: bold;
                }

                .title {
                    font-size: 18px;
                    font-weight: bold;
                    text-align: center;
                    background-color: #00b894;
                    color: white;
                }

                .section {
                    font-weight: bold;
                    background-color: #f1f1f1;
                }
            </style>
        </head>
        <body>

        <table>
            <tr>
                <td colspan="8" class="title">
                    REKAPAN PPDB SMKS MAARIF NU KOTA BATAM
                </td>
            </tr>

            <tr>
                <td colspan="2">Tanggal Export</td>
                <td colspan="6">' . date('d-m-Y H:i') . '</td>
            </tr>

            <tr>
                <td colspan="8"></td>
            </tr>

            <tr>
                <td colspan="8" class="section">REKAP UTAMA</td>
            </tr>

            <tr>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th colspan="6"></th>
            </tr>

            <tr><td>Total Pendaftar</td><td>' . $data['totalPendaftar'] . '</td><td colspan="6"></td></tr>
            <tr><td>Diterima</td><td>' . $data['totalDiterima'] . '</td><td colspan="6"></td></tr>
            <tr><td>Tidak Diterima</td><td>' . $data['totalTidakDiterima'] . '</td><td colspan="6"></td></tr>
            <tr><td>Menunggu Konfirmasi</td><td>' . $data['totalMenunggu'] . '</td><td colspan="6"></td></tr>
            <tr><td>Perbaiki Data</td><td>' . $data['totalPerbaikiData'] . '</td><td colspan="6"></td></tr>
            <tr><td>Perbaiki Dokumen</td><td>' . $data['totalPerbaikiDokumen'] . '</td><td colspan="6"></td></tr>
            <tr><td>Sudah Diproses Seleksi</td><td>' . $data['totalSudahDiproses'] . '</td><td colspan="6"></td></tr>
            <tr><td>Belum Diproses Seleksi</td><td>' . $data['totalBelumDiproses'] . '</td><td colspan="6"></td></tr>
            <tr><td>Pembayaran Masuk</td><td>' . $data['totalPembayaran'] . '</td><td colspan="6"></td></tr>
            <tr><td>Upload Dokumen</td><td>' . $data['totalDokumen'] . '</td><td colspan="6"></td></tr>
            <tr><td>Tes Al-Qur’an</td><td>' . $data['totalTesQuran'] . '</td><td colspan="6"></td></tr>
            <tr><td>Wawancara</td><td>' . $data['totalWawancara'] . '</td><td colspan="6"></td></tr>

            <tr>
                <td colspan="8"></td>
            </tr>

            <tr>
                <td colspan="8" class="section">REKAP PENDAFTAR PER JURUSAN</td>
            </tr>

            <tr>
                <th>Jurusan</th>
                <th>Jumlah</th>
                <th colspan="6"></th>
            </tr>';

        foreach ($data['rekapJurusan'] as $jurusan => $jumlah) {
            $html .= '
            <tr>
                <td>' . htmlspecialchars($jurusan) . '</td>
                <td>' . $jumlah . '</td>
                <td colspan="6"></td>
            </tr>';
        }

        $html .= '
            <tr>
                <td colspan="8"></td>
            </tr>

            <tr>
                <td colspan="8" class="section">DETAIL DATA PENDAFTAR</td>
            </tr>

            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Jurusan</th>
                <th>Nilai Raport</th>
                <th>Nilai Al-Qur’an</th>
                <th>Nilai Wawancara</th>
                <th>Total Nilai</th>
                <th>Status</th>
            </tr>';

        foreach ($data['daftarSiswa'] as $index => $siswa) {
            $html .= '
            <tr>
                <td>' . ($index + 1) . '</td>
                <td>' . htmlspecialchars($siswa->user->name ?? '-') . '</td>
                <td>' . htmlspecialchars($siswa->kelas->nama_jurusan ?? '-') . '</td>
                <td>' . ($siswa->nilai_rata ?? '-') . '</td>
                <td>' . ($siswa->nilai_quran ?? '-') . '</td>
                <td>' . ($siswa->nilai_wawancara ?? '-') . '</td>
                <td>' . ($siswa->total_nilai !== null ? number_format($siswa->total_nilai, 2) : '-') . '</td>
                <td>' . htmlspecialchars($siswa->status ?? '-') . '</td>
            </tr>';
        }

        $html .= '
        </table>
        </body>
        </html>';

        return response($html)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    private function getRekapData()
    {
        $siswas = Siswa::with(['user', 'kelas'])->get();

        $daftarSiswa = $siswas;

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

        return compact(
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
            'rekapJurusan',
            'daftarSiswa'
        );
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