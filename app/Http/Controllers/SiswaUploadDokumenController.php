<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\DokumenSiswa;
use App\Models\DokumenSiswaPindahan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaUploadDokumenController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('user_id', auth()->user()->id)->first();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        $dokumen = DokumenSiswa::where('siswa_id', $siswa->id)->first();

        // Tetap disiapkan kalau nanti ingin memakai dokumen khusus pindahan tambahan
        $pindahan = DokumenSiswaPindahan::where('siswa_id', $siswa->id)->first();

        return view('home.siswa.dokumen.index', compact('siswa', 'dokumen', 'pindahan'));
    }

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | CARI DATA SISWA DAN DOKUMEN
        |--------------------------------------------------------------------------
        */
        $siswa = Siswa::where('user_id', auth()->id())->first();

        if (!$siswa) {
            return redirect()
                ->back()
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        $dokumen = DokumenSiswa::where('siswa_id', $siswa->id)->first();

        /*
        |--------------------------------------------------------------------------
        | ATURAN WAJIB
        |--------------------------------------------------------------------------
        | Jika dokumen belum ada, file utama wajib diunggah.
        | Jika dokumen sudah ada, file boleh kosong dan memakai file lama.
        */
        $aturanFileUtama = $dokumen ? 'nullable' : 'required';

        /*
        |--------------------------------------------------------------------------
        | VALIDASI FILE
        |--------------------------------------------------------------------------
        | Validasi diletakkan di luar try-catch agar pesan validasi Laravel
        | tidak berubah menjadi pesan error sistem.
        */
        $request->validate([
            'file_kk' => [
                $aturanFileUtama,
                'file',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'file_ktp' => [
                $aturanFileUtama,
                'file',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'file_akta' => [
                $aturanFileUtama,
                'file',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'file_raport' => [
                $aturanFileUtama,
                'file',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'file_ijazah' => [
                $aturanFileUtama,
                'file',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            // KKS/KIP tidak wajib dimiliki semua siswa
            'file_kip' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            // Surat pindahan hanya untuk siswa pindahan
            'file_keputusan' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'file_foto' => [
                $aturanFileUtama,
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ], [
            /*
            |--------------------------------------------------------------------------
            | PESAN FILE WAJIB
            |--------------------------------------------------------------------------
            */
            'file_kk.required' => 'File Kartu Keluarga wajib diunggah.',
            'file_ktp.required' => 'File KTP orang tua wajib diunggah.',
            'file_akta.required' => 'File akta kelahiran wajib diunggah.',
            'file_raport.required' => 'File rapor wajib diunggah.',
            'file_ijazah.required' => 'File ijazah wajib diunggah.',
            'file_foto.required' => 'File pas foto wajib diunggah.',

            /*
            |--------------------------------------------------------------------------
            | PESAN FORMAT FILE
            |--------------------------------------------------------------------------
            */
            'file_kk.mimes' => 'File KK harus berformat JPG, JPEG, atau PNG.',
            'file_ktp.mimes' => 'File KTP orang tua harus berformat JPG, JPEG, atau PNG.',
            'file_akta.mimes' => 'File akta harus berformat JPG, JPEG, atau PNG.',
            'file_raport.mimes' => 'File rapor harus berformat JPG, JPEG, atau PNG.',
            'file_ijazah.mimes' => 'File ijazah harus berformat JPG, JPEG, atau PNG.',
            'file_kip.mimes' => 'File KKS/KIP harus berformat JPG, JPEG, atau PNG.',
            'file_keputusan.mimes' => 'Surat pindahan harus berformat JPG, JPEG, atau PNG.',
            'file_foto.mimes' => 'File pas foto harus berformat JPG, JPEG, atau PNG.',

            'file_foto.image' => 'Pas foto harus berupa file gambar.',

            /*
            |--------------------------------------------------------------------------
            | PESAN UKURAN FILE
            |--------------------------------------------------------------------------
            */
            'file_kk.max' => 'Ukuran file KK maksimal 2 MB.',
            'file_ktp.max' => 'Ukuran file KTP orang tua maksimal 2 MB.',
            'file_akta.max' => 'Ukuran file akta maksimal 2 MB.',
            'file_raport.max' => 'Ukuran file rapor maksimal 2 MB.',
            'file_ijazah.max' => 'Ukuran file ijazah maksimal 2 MB.',
            'file_kip.max' => 'Ukuran file KKS/KIP maksimal 2 MB.',
            'file_keputusan.max' => 'Ukuran surat pindahan maksimal 2 MB.',
            'file_foto.max' => 'Ukuran file pas foto maksimal 2 MB.',
        ]);

        try {
            /*
            |--------------------------------------------------------------------------
            | FUNGSI UPLOAD ATAU GUNAKAN FILE LAMA
            |--------------------------------------------------------------------------
            */
            $uploadAtauFileLama = function (string $namaField) use ($request, $dokumen) {
                if ($request->hasFile($namaField)) {
                    return FileHelper::uploadFile(
                        $request->file($namaField),
                        'uploads/dokumen'
                    );
                }

                return $dokumen ? $dokumen->{$namaField} : null;
            };

            /*
            |--------------------------------------------------------------------------
            | SIAPKAN DATA DOKUMEN
            |--------------------------------------------------------------------------
            */
            $dataDokumen = [
                'file_kk' => $uploadAtauFileLama('file_kk'),
                'file_ktp' => $uploadAtauFileLama('file_ktp'),
                'file_akta' => $uploadAtauFileLama('file_akta'),
                'file_raport' => $uploadAtauFileLama('file_raport'),
                'file_ijazah' => $uploadAtauFileLama('file_ijazah'),
                'file_kip' => $uploadAtauFileLama('file_kip'),
                'file_keputusan' => $uploadAtauFileLama('file_keputusan'),
                'file_foto' => $uploadAtauFileLama('file_foto'),
                'status' => 'Menunggu Konfirmasi',
            ];

            /*
            |--------------------------------------------------------------------------
            | SIMPAN ATAU PERBARUI DOKUMEN
            |--------------------------------------------------------------------------
            */
            DokumenSiswa::updateOrCreate(
                [
                    'siswa_id' => $siswa->id,
                ],
                $dataDokumen
            );

            /*
            |--------------------------------------------------------------------------
            | UPDATE STATUS SISWA
            |--------------------------------------------------------------------------
            */
            $siswa->update([
                'status' => 'Menunggu Konfirmasi',
            ]);

            return redirect()
                ->back()
                ->with('success', 'Dokumen berhasil diunggah.');

        } catch (Throwable $th) {
            /*
            |--------------------------------------------------------------------------
            | SIMPAN DETAIL ERROR KE LOG
            |--------------------------------------------------------------------------
            | Detail error hanya dapat dilihat oleh pengembang melalui
            | storage/logs/laravel.log.
            */
            Log::error('Gagal mengunggah dokumen siswa.', [
                'user_id' => auth()->id(),
                'siswa_id' => $siswa->id,
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);

            /*
            |--------------------------------------------------------------------------
            | PESAN SEDERHANA UNTUK SISWA
            |--------------------------------------------------------------------------
            */
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Dokumen gagal diunggah. Silakan periksa file dan coba kembali.'
                );
        }
    }
}