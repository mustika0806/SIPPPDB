<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\QuranTes;
use App\Models\DokumenSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Menyimpan Tes Quran siswa.
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
        | Tolak pengiriman jika tahap sebelumnya belum selesai
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

                'video_url' => [
                    'required',
                    'url',
                    'max:500',
                    'regex:/^https?:\/\/(www\.)?(youtube\.com|youtu\.be)\//i',
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

                'video_url.required' =>
                    'Link video YouTube wajib diisi.',

                'video_url.url' =>
                    'Link video YouTube tidak valid.',

                'video_url.max' =>
                    'Link video YouTube terlalu panjang.',

                'video_url.regex' =>
                    'Link video harus berasal dari YouTube.',
            ]
        );

        try {
            /*
            |--------------------------------------------------------------------------
            | Simpan data Tes Quran ke database
            |--------------------------------------------------------------------------
            */
            QuranTes::create([
                'user_id' =>
                    Auth::id(),

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

                'video_url' =>
                    $validated['video_url'],

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
                    'Link video Tes Membaca Al-Quran berhasil disimpan.'
                );
        } catch (\Throwable $error) {
            report($error);

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Data Tes Membaca Al-Quran gagal disimpan. Silakan coba kembali.'
                );
        }
    }
}