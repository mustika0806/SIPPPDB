<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;

class AdminHasilSeleksiController extends Controller
{
    public function index()
    {
        $siswasAwal = Siswa::with(['user', 'kelas'])->get();

        $siswas = collect();

        $siswasAwal
            ->groupBy('kelas_id')
            ->sortKeys()
            ->each(function ($group) use ($siswas) {
                $sorted = $group
                    ->sortByDesc(function ($siswa) {
                        return $siswa->total_nilai ?? -1;
                    })
                    ->values();

                foreach ($sorted as $index => $siswa) {
                    $kuota = $this->ambilKuotaJurusan($siswa->kelas);

                    $siswa->setAttribute('peringkat_jurusan', $siswa->total_nilai !== null ? $index + 1 : null);
                    $siswa->setAttribute('kuota_jurusan', $kuota);

                    $siswas->push($siswa);
                }
            });

        return view('home.admin.hasil_seleksi.index', compact('siswas'));
    }

    public function proses($id)
    {
        $siswa = Siswa::findOrFail($id);

        if (!$siswa->kelas_id) {
            return redirect()
                ->back()
                ->with('error', 'Jurusan siswa belum ditentukan.');
        }

        $this->prosesRekapitulasiPerJurusan($siswa->kelas_id);

        return redirect()
            ->back()
            ->with('success', 'Rekapitulasi data jurusan berhasil diproses berdasarkan peringkat nilai tertinggi.');
    }

    public function prosesSemua()
    {
        $kelasIds = Siswa::whereNotNull('kelas_id')
            ->distinct()
            ->pluck('kelas_id');

        foreach ($kelasIds as $kelasId) {
            $this->prosesRekapitulasiPerJurusan($kelasId);
        }

        return redirect()
            ->back()
            ->with('success', 'Rekapitulasi semua data berhasil diproses berdasarkan jurusan dan peringkat nilai.');
    }

    private function prosesRekapitulasiPerJurusan($kelasId)
    {
        $kelas = Kelas::find($kelasId);
        $kuota = $this->ambilKuotaJurusan($kelas);

        $siswas = Siswa::with('kelas')
            ->where('kelas_id', $kelasId)
            ->get();

        foreach ($siswas as $siswa) {
            if (
                $siswa->nilai_rata === null ||
                $siswa->nilai_quran === null ||
                $siswa->nilai_wawancara === null
            ) {
                $siswa->update([
                    'total_nilai' => null,
                    'status' => 'Menunggu Konfirmasi',
                    'catatan_admin' => null,
                ]);

                continue;
            }

            $totalNilai = ($siswa->nilai_rata * 0.4) +
                          ($siswa->nilai_quran * 0.3) +
                          ($siswa->nilai_wawancara * 0.3);

            $siswa->update([
                'total_nilai' => round($totalNilai, 2),
            ]);
        }

        $siswasLengkap = Siswa::with('kelas')
            ->where('kelas_id', $kelasId)
            ->whereNotNull('total_nilai')
            ->orderByDesc('total_nilai')
            ->get();

        foreach ($siswasLengkap as $index => $siswa) {
            $peringkat = $index + 1;
            $totalNilai = (float) $siswa->total_nilai;

            /*
             * Ketentuan:
             * 1. Jika kuota jurusan ada, siswa diterima berdasarkan peringkat tertinggi sampai kuota terpenuhi.
             * 2. Total nilai tetap harus minimal 70.
             * 3. Jika kuota belum diisi, sistem memakai aturan lama: total nilai minimal 70.
             */

            if ($kuota > 0) {
                $diterima = $peringkat <= $kuota && $totalNilai >= 70;
            } else {
                $diterima = $totalNilai >= 70;
            }

            if ($diterima) {
                $status = 'Diterima';
                $catatan = 'Selamat, Anda dinyatakan diterima. Harap datang bersama orang tua/wali saat daftar ulang dan membawa bukti pengumuman diterima.';
            } else {
                $status = 'Tidak Diterima';
                $catatan = 'Mohon maaf, Anda belum dinyatakan diterima pada seleksi kali ini.';
            }

            $siswa->update([
                'status' => $status,
                'catatan_admin' => $catatan,
                'jadwal_daftar_ulang' => $status === 'Diterima'
                    ? 'Akan diinformasikan oleh pihak sekolah'
                    : null,
                'tempat_daftar_ulang' => $status === 'Diterima'
                    ? 'Ruang Tata Usaha Sekolah'
                    : null,
            ]);
        }
    }

    private function ambilKuotaJurusan($kelas)
    {
        if (!$kelas) {
            return 0;
        }

        return (int) (
            $kelas->kuota ??
            $kelas->jumlah_kuota ??
            $kelas->daya_tampung ??
            0
        );
    }
}