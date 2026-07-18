<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\QuranTes;
use App\Models\DokumenSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaTesQuranController extends Controller
{
    /**
     * Menampilkan halaman Tes Quran siswa.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Cari data siswa berdasarkan akun yang sedang login
        |--------------------------------------------------------------------------
        */
        $siswa = Siswa::where('user_id', Auth::id())
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Ambil dokumen terbaru milik siswa
        |--------------------------------------------------------------------------
        */
        $dokumen = null;

        if ($siswa) {
            $dokumen = DokumenSiswa::where(
                'siswa_id',
                $siswa->id
            )
                ->latest('id')
                ->first();
        }

        /*
        |--------------------------------------------------------------------------
        | Tentukan akses halaman Tes Quran
        |--------------------------------------------------------------------------
        | Akses hanya diberikan apabila:
        | 1. Data siswa ditemukan.
        | 2. Dokumen siswa ditemukan.
        | 3. Status dokumen adalah "Diterima".
        */
        $aksesTesQuran = $siswa !== null
            && $dokumen !== null
            && trim($dokumen->status) === 'Diterima';

        /*
        |--------------------------------------------------------------------------
        | Ambil data Tes Quran milik akun yang sedang login
        |--------------------------------------------------------------------------
        */
        $tests = collect();

        if ($aksesTesQuran) {
            $tests = QuranTes::where(
                'user_id',
                Auth::id()
            )
                ->latest('id')
                ->get();
        }

        return view(
            'home.siswa.quran.index',
            compact(
                'tests',
                'siswa',
                'dokumen',
                'aksesTesQuran'
            )
        );
    }

    /**
     * Menyimpan video Tes Quran siswa.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Cari data siswa berdasarkan akun yang sedang login
        |--------------------------------------------------------------------------
        */
        $siswa = Siswa::where('user_id', Auth::id())
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Ambil dokumen terbaru milik siswa
        |--------------------------------------------------------------------------
        */
        $dokumen = null;

        if ($siswa) {
            $dokumen = DokumenSiswa::where(
                'siswa_id',
                $siswa->id
            )
                ->latest('id')
                ->first();
        }

        /*
        |--------------------------------------------------------------------------
        | Periksa akses Tes Quran
        |--------------------------------------------------------------------------
        */
        $aksesTesQuran = $siswa !== null
            && $dokumen !== null
            && trim($dokumen->status) === 'Diterima';

        /*
        |--------------------------------------------------------------------------
        | Tolak upload jika tahap sebelumnya belum selesai
        |--------------------------------------------------------------------------
        */
        if (!$aksesTesQuran) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Anda belum mendapatkan akses untuk halaman ini. Silakan selesaikan tahap sebelumnya terlebih dahulu.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Validasi data Tes Quran
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate(
            [
                'test_date' => [
                    'required',
                    'date',
                ],

                'juz' => [
                    'required',
                    'integer',
                    'min:1',
                    'max:30',
                ],

                'surat' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'ayat' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'keterangan_bacaan' => [
                    'nullable',
                    'string',
                    'max:1000',
                ],

                'video_path' => [
                    'required',
                    'file',
                    'mimes:mp4',
                    'max:51200',
                ],
            ],
            [
                'test_date.required' =>
                    'Tanggal tes wajib diisi.',

                'test_date.date' =>
                    'Tanggal tes tidak valid.',

                'juz.required' =>
                    'Juz yang dibaca wajib dipilih.',

                'juz.integer' =>
                    'Juz harus berupa angka.',

                'juz.min' =>
                    'Juz minimal adalah Juz 1.',

                'juz.max' =>
                    'Juz maksimal adalah Juz 30.',

                'surat.required' =>
                    'Nama surat wajib diisi.',

                'surat.string' =>
                    'Nama surat harus berupa teks.',

                'surat.max' =>
                    'Nama surat maksimal 100 karakter.',

                'ayat.required' =>
                    'Ayat yang dibaca wajib diisi.',

                'ayat.string' =>
                    'Ayat yang dibaca harus berupa teks.',

                'ayat.max' =>
                    'Ayat maksimal 100 karakter.',

                'keterangan_bacaan.string' =>
                    'Keterangan bacaan harus berupa teks.',

                'keterangan_bacaan.max' =>
                    'Keterangan bacaan maksimal 1.000 karakter.',

                'video_path.required' =>
                    'Video Tes Membaca Al-Quran wajib diunggah.',

                'video_path.file' =>
                    'File video yang diunggah tidak valid.',

                'video_path.mimes' =>
                    'Video harus berformat MP4.',

                'video_path.max' =>
                    'Ukuran video maksimal 50 MB.',
            ]
        );

        $path = null;

        try {
            /*
            |--------------------------------------------------------------------------
            | Simpan video ke storage
            |--------------------------------------------------------------------------
            */
            $path = $request
                ->file('video_path')
                ->store(
                    'quran_tests',
                    'public'
                );

            /*
            |--------------------------------------------------------------------------
            | Simpan data Tes Quran ke database
            |--------------------------------------------------------------------------
            */
            QuranTes::create([
                'user_id' => Auth::id(),

                'test_date' =>
                    $validated['test_date'],

                'juz' =>
                    $validated['juz'],

                'surat' =>
                    $validated['surat'],

                'ayat' =>
                    $validated['ayat'],

                'keterangan_bacaan' =>
                    $validated['keterangan_bacaan'] ?? null,

                'video_path' =>
                    $path,

                'score' =>
                    null,

                'notes' =>
                    null,

                'status' =>
                    'Menunggu Penilaian',
            ]);

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Video Tes Membaca Al-Quran berhasil diunggah.'
                );
        } catch (\Throwable $error) {
            /*
            |--------------------------------------------------------------------------
            | Hapus video apabila penyimpanan database gagal
            |--------------------------------------------------------------------------
            */
            if (
                $path !== null
                && Storage::disk('public')->exists($path)
            ) {
                Storage::disk('public')->delete($path);
            }

            report($error);

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Video gagal diunggah. Silakan coba kembali.'
                );
        }
    }
}