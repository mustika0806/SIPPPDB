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
        try {
            $siswa = Siswa::where('user_id', auth()->user()->id)->first();

            if (!$siswa) {
                return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
            }

            $dokumen = DokumenSiswa::where('siswa_id', $siswa->id)->first();

            /*
            |--------------------------------------------------------------------------
            | VALIDASI FILE
            |--------------------------------------------------------------------------
            | Semua file dibuat nullable agar saat update siswa tidak wajib upload ulang.
            | Surat pindahan juga dibuat nullable karena hanya untuk siswa pindahan.
            */
            $request->validate([
                'file_kk' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'file_ktp' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'file_akta' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'file_raport' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'file_ijazah' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'file_kip' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'file_keputusan' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'file_foto' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ], [
                'file_kk.mimes' => 'File KK harus berformat jpg, jpeg, atau png.',
                'file_ktp.mimes' => 'File KTP orang tua harus berformat jpg, jpeg, atau png.',
                'file_akta.mimes' => 'File akta harus berformat jpg, jpeg, atau png.',
                'file_raport.mimes' => 'File raport harus berformat jpg, jpeg, atau png.',
                'file_ijazah.mimes' => 'File ijazah harus berformat jpg, jpeg, atau png.',
                'file_kip.mimes' => 'File KKS/KIP harus berformat jpg, jpeg, atau png.',
                'file_keputusan.mimes' => 'Surat pindahan harus berformat jpg, jpeg, atau png.',
                'file_foto.mimes' => 'File pas foto harus berformat jpg, jpeg, atau png.',

                'file_kk.max' => 'Ukuran file KK maksimal 2MB.',
                'file_ktp.max' => 'Ukuran file KTP orang tua maksimal 2MB.',
                'file_akta.max' => 'Ukuran file akta maksimal 2MB.',
                'file_raport.max' => 'Ukuran file raport maksimal 2MB.',
                'file_ijazah.max' => 'Ukuran file ijazah maksimal 2MB.',
                'file_kip.max' => 'Ukuran file KKS/KIP maksimal 2MB.',
                'file_keputusan.max' => 'Ukuran surat pindahan maksimal 2MB.',
                'file_foto.max' => 'Ukuran file pas foto maksimal 2MB.',
            ]);

            /*
            |--------------------------------------------------------------------------
            | UPLOAD FILE
            |--------------------------------------------------------------------------
            | Kalau user upload file baru, file baru akan disimpan.
            | Kalau tidak upload file baru, file lama tetap dipakai.
            */
            $file_kk = $request->hasFile('file_kk')
                ? FileHelper::uploadFile($request->file('file_kk'), 'uploads/dokumen')
                : ($dokumen->file_kk ?? null);

            $file_ktp = $request->hasFile('file_ktp')
                ? FileHelper::uploadFile($request->file('file_ktp'), 'uploads/dokumen')
                : ($dokumen->file_ktp ?? null);

            $file_akta = $request->hasFile('file_akta')
                ? FileHelper::uploadFile($request->file('file_akta'), 'uploads/dokumen')
                : ($dokumen->file_akta ?? null);

            $file_raport = $request->hasFile('file_raport')
                ? FileHelper::uploadFile($request->file('file_raport'), 'uploads/dokumen')
                : ($dokumen->file_raport ?? null);

            $file_ijazah = $request->hasFile('file_ijazah')
                ? FileHelper::uploadFile($request->file('file_ijazah'), 'uploads/dokumen')
                : ($dokumen->file_ijazah ?? null);

            $file_kip = $request->hasFile('file_kip')
                ? FileHelper::uploadFile($request->file('file_kip'), 'uploads/dokumen')
                : ($dokumen->file_kip ?? null);

            $file_keputusan = $request->hasFile('file_keputusan')
                ? FileHelper::uploadFile($request->file('file_keputusan'), 'uploads/dokumen')
                : ($dokumen->file_keputusan ?? null);

            $file_foto = $request->hasFile('file_foto')
                ? FileHelper::uploadFile($request->file('file_foto'), 'uploads/dokumen')
                : ($dokumen->file_foto ?? null);

            /*
            |--------------------------------------------------------------------------
            | SIMPAN ATAU UPDATE DOKUMEN SISWA
            |--------------------------------------------------------------------------
            */
            if ($dokumen) {
                $dokumen->update([
                    'file_kk' => $file_kk,
                    'file_ktp' => $file_ktp,
                    'file_akta' => $file_akta,
                    'file_raport' => $file_raport,
                    'file_ijazah' => $file_ijazah,
                    'file_kip' => $file_kip,
                    'file_keputusan' => $file_keputusan,
                    'file_foto' => $file_foto,
                    'status' => 'Menunggu Konfirmasi',
                ]);
            } else {
                DokumenSiswa::create([
                    'siswa_id' => $siswa->id,
                    'file_kk' => $file_kk,
                    'file_ktp' => $file_ktp,
                    'file_akta' => $file_akta,
                    'file_raport' => $file_raport,
                    'file_ijazah' => $file_ijazah,
                    'file_kip' => $file_kip,
                    'file_keputusan' => $file_keputusan,
                    'file_foto' => $file_foto,
                    'status' => 'Menunggu Konfirmasi',
                ]);
            }

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
                ->with('success', 'Berhasil mengupload dokumen.');

        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('error', 'Gagal mengupload dokumen: ' . $th->getMessage());
        }
    }
}