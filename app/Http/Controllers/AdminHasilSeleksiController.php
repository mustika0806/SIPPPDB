<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminHasilSeleksiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Menampilkan Data Hasil Akhir
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $siswasAwal = Siswa::with([
            'user',
            'kelas',
        ])->get();

        /*
         * Menghitung total nilai secara otomatis.
         *
         * Nilai rapor     = 40%
         * Nilai Al-Qur'an = 30%
         * Nilai wawancara = 30%
         *
         * Perhitungan ini tidak menentukan siswa diterima
         * atau tidak diterima.
         */
        foreach ($siswasAwal as $siswa) {
            $nilaiLengkap =
                $siswa->nilai_rata !== null &&
                $siswa->nilai_quran !== null &&
                $siswa->nilai_tka !== null;

            if ($nilaiLengkap) {
                $totalNilai =
                    ($siswa->nilai_rata * 0.4) +
                    ($siswa->nilai_quran * 0.3) +
                    ($siswa->nilai_tka * 0.3);

                $totalNilai = round($totalNilai, 2);

                /*
                 * Simpan total nilai jika terdapat perubahan.
                 */
                if ((float) $siswa->total_nilai !== $totalNilai) {
                    $siswa->update([
                        'total_nilai' => $totalNilai,
                    ]);
                }

                $siswa->total_nilai = $totalNilai;
            } else {
                /*
                 * Jika salah satu nilai belum tersedia,
                 * total nilai dikosongkan.
                 */
                $dataUpdate = [];

                if ($siswa->total_nilai !== null) {
                    $dataUpdate['total_nilai'] = null;
                }

                /*
                 * Siswa dengan nilai belum lengkap tidak boleh
                 * memiliki status hasil seleksi final.
                 */
                if (
                    in_array(
                        $siswa->status,
                        ['Diterima', 'Tidak Diterima']
                    )
                ) {
                    $dataUpdate['status'] = 'Menunggu Konfirmasi';
                    $dataUpdate['catatan_admin'] = null;
                    $dataUpdate['jadwal_daftar_ulang'] = null;
                    $dataUpdate['tempat_daftar_ulang'] = null;
                }

                if (!empty($dataUpdate)) {
                    $siswa->update($dataUpdate);
                }

                $siswa->total_nilai = null;
            }
        }

        /*
         * Mengelompokkan siswa berdasarkan jurusan.
         */
        $siswas = collect();

        $siswasAwal
            ->groupBy('kelas_id')
            ->sortKeys()
            ->each(function ($group) use ($siswas) {
                /*
                 * Urutkan siswa berdasarkan total nilai
                 * dari nilai tertinggi ke terendah.
                 */
                $sorted = $group
                    ->sortByDesc(function ($siswa) {
                        return $siswa->total_nilai ?? -1;
                    })
                    ->values();

                foreach ($sorted as $index => $siswa) {
                    /*
                     * Peringkat hanya diberikan apabila
                     * total nilai sudah tersedia.
                     */
                    $siswa->setAttribute(
                        'peringkat_jurusan',
                        $siswa->total_nilai !== null
                            ? $index + 1
                            : null
                    );

                    $siswas->push($siswa);
                }
            });

        return view(
            'home.admin.hasil_seleksi.index',
            compact('siswas')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Menyimpan Status Manual
    |--------------------------------------------------------------------------
    */
    public function updateStatus(Request $request, Siswa $siswa)
    {
        /*
         * Status hanya boleh Diterima atau Tidak Diterima.
         * Pilihan Belum Diproses tidak digunakan.
         */
        $request->validate([
            'status' => [
                'required',
                'in:Diterima,Tidak Diterima',
            ],
        ], [
            'status.required' =>
                'Status siswa harus dipilih.',

            'status.in' =>
                'Status siswa tidak valid.',
        ]);

        /*
         * Periksa kelengkapan seluruh nilai.
         */
        $nilaiLengkap =
            $siswa->nilai_rata !== null &&
            $siswa->nilai_quran !== null &&
            $siswa->nilai_wawancara !== null;

        if (!$nilaiLengkap) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Status belum dapat ditentukan karena nilai siswa belum lengkap.'
                );
        }

        /*
         * Membuat catatan berdasarkan status yang
         * dipilih secara manual oleh admin.
         */
        if ($request->status === 'Diterima') {
            $catatan =
                'Selamat, Anda dinyatakan diterima. Harap datang bersama orang tua/wali saat daftar ulang dan membawa bukti pengumuman diterima.';

            $jadwalDaftarUlang =
                'Akan diinformasikan oleh pihak sekolah';

            $tempatDaftarUlang =
                'Ruang Tata Usaha Sekolah';
        } else {
            $catatan =
                'Mohon maaf, Anda belum dinyatakan diterima pada seleksi kali ini.';

            $jadwalDaftarUlang = null;
            $tempatDaftarUlang = null;
        }

        /*
         * Simpan status hasil seleksi.
         */
        $siswa->update([
            'status' => $request->status,
            'catatan_admin' => $catatan,
            'jadwal_daftar_ulang' => $jadwalDaftarUlang,
            'tempat_daftar_ulang' => $tempatDaftarUlang,
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Status siswa berhasil diperbarui menjadi ' .
                    $request->status .
                    '.'
            );
    }
}