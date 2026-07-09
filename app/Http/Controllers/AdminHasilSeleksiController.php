<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

class AdminHasilSeleksiController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with(['user', 'kelas'])
            ->latest()
            ->get();

        return view('home.admin.hasil_seleksi.index', compact('siswas'));
    }

    public function proses($id)
    {
        $siswa = Siswa::findOrFail($id);

        if (
            $siswa->nilai_rata === null ||
            $siswa->nilai_quran === null ||
            $siswa->nilai_wawancara === null
        ) {
            return redirect()
                ->back()
                ->with('error', 'Nilai raport, tes Al-Qur’an, dan wawancara harus lengkap terlebih dahulu.');
        }

        $nilaiRaport = (float) $siswa->nilai_rata;
        $nilaiQuran = (float) $siswa->nilai_quran;
        $nilaiWawancara = (float) $siswa->nilai_wawancara;

        $totalNilai = ($nilaiRaport * 0.4) +
                      ($nilaiQuran * 0.3) +
                      ($nilaiWawancara * 0.3);

        $totalNilai = round($totalNilai, 2);

        $status = $totalNilai >= 70 ? 'Diterima' : 'Tidak Diterima';

        $siswa->update([
            'total_nilai' => $totalNilai,
            'status' => $status,
            'jadwal_daftar_ulang' => $status === 'Diterima'
                ? 'Akan diinformasikan oleh pihak sekolah'
                : null,
            'tempat_daftar_ulang' => $status === 'Diterima'
                ? 'Ruang Tata Usaha Sekolah'
                : null,
            'catatan_admin' => $status === 'Diterima'
                ? 'Selamat, Anda dinyatakan diterima. Silakan melakukan daftar ulang langsung di sekolah.'
                : 'Mohon maaf, Anda belum dinyatakan diterima pada seleksi kali ini.',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Hasil seleksi siswa berhasil diproses.');
    }

    public function prosesSemua()
    {
        $siswas = Siswa::all();

        $berhasil = 0;
        $belumLengkap = 0;

        foreach ($siswas as $siswa) {
            if (
                $siswa->nilai_rata === null ||
                $siswa->nilai_quran === null ||
                $siswa->nilai_wawancara === null
            ) {
                $belumLengkap++;
                continue;
            }

            $nilaiRaport = (float) $siswa->nilai_rata;
            $nilaiQuran = (float) $siswa->nilai_quran;
            $nilaiWawancara = (float) $siswa->nilai_wawancara;

            $totalNilai = ($nilaiRaport * 0.4) +
                          ($nilaiQuran * 0.3) +
                          ($nilaiWawancara * 0.3);

            $totalNilai = round($totalNilai, 2);

            $status = $totalNilai >= 70 ? 'Diterima' : 'Tidak Diterima';

            $siswa->update([
                'total_nilai' => $totalNilai,
                'status' => $status,
                'jadwal_daftar_ulang' => $status === 'Diterima'
                    ? 'Akan diinformasikan oleh pihak sekolah'
                    : null,
                'tempat_daftar_ulang' => $status === 'Diterima'
                    ? 'Ruang Tata Usaha Sekolah'
                    : null,
                'catatan_admin' => $status === 'Diterima'
                    ? 'Selamat, Anda dinyatakan diterima. Silakan melakukan daftar ulang langsung di sekolah.'
                    : 'Mohon maaf, Anda belum dinyatakan diterima pada seleksi kali ini.',
            ]);

            $berhasil++;
        }

        return redirect()
            ->back()
            ->with('success', "Proses seleksi selesai. Berhasil: {$berhasil}, belum lengkap: {$belumLengkap}.");
    }
}