<?php

namespace App\Http\Controllers;

use App\Http\Requests\BiodataRequest;
use App\Http\Requests\WaliRequest;
use App\Http\Requests\SiswaPendaftaranRequest;
use App\Models\Kelas;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class SiswaPendaftaranController extends Controller
{
    /* ======================================================
        HELPER FUNCTIONS
    ====================================================== */

    private function activePendaftaran()
    {
        return Pendaftaran::whereDate('tanggal_buka_pendaftaran', '<=', today())
            ->whereDate('tanggal_akhir_pendaftaran', '>', today())
            ->first();
    }

    // private function activePendaftaran()
    // {
    //     return Pendaftaran::whereDate('mulai', '<=', today())
    //         ->whereDate('berakhir', '>', today())
    //         ->first();
    // }

    private function getSiswa()
    {
        return Siswa::firstWhere('user_id', auth()->id());
    }

    private function saveSiswa(array $data)
    {
        $siswa = $this->getSiswa();

        if ($siswa) {
            $siswa->update($data);
            return $siswa;
        }

        return Siswa::create(array_merge($data, [
            'user_id' => auth()->id()
        ]));
    }

    /* ======================================================
        VIEW INDEX
    ====================================================== */

    public function index()
    {
        return view('home.siswa.pendaftaran.index', [
            'kelas' => Kelas::all(),
            'siswa' => $this->getSiswa()
        ]);
    }

    /* ======================================================
        STEP: DATA SISWA 
    ====================================================== */

    public function store(SiswaPendaftaranRequest $request)
    {
        try {
            $pendaftaran = $this->activePendaftaran();

            if (!$pendaftaran) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pendaftaran sedang tidak dibuka.'
                ], 400);
            }

            $kelas = Kelas::find($request->kelas_id);

            if (!$kelas) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jurusan yang dipilih tidak ditemukan.'
                ], 422);
            }

            if ($kelas->kuota_tersedia <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kuota jurusan ' .
                        $kelas->nama_jurusan .
                        ' sudah penuh. Silakan pilih jurusan lain.'
                ], 422);
            }

            $data = $request->validated();
            $data['pendaftaran_id'] = $pendaftaran->id;

            $this->saveSiswa($data);

            return response()->json([
                'success' => true,
                'message' => 'Data pendaftaran berhasil disimpan.',
                'redirect' => route('siswa.pendaftaran.index')
            ], 200);

        } catch (\Throwable $e) {
            Log::error('Gagal menyimpan data pendaftaran siswa', [
                'user_id' => auth()->id(),
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data. Silakan periksa kembali data yang dimasukkan.'
            ], 500);
        }
    }

    /* ======================================================
        STEP: BIODATA
    ====================================================== */

    public function biodata(BiodataRequest $request)
    {
        $data = $request->validated();

        try {
            $pendaftaran = $this->activePendaftaran();

            if (!$pendaftaran) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pendaftaran tidak aktif'
                ], 403);
            }

            $data['pendaftaran_id'] = $pendaftaran->id;
            $data['nama_lengkap'] = $data['name'];

            $this->saveSiswa($data);

            User::where('id', auth()->id())
                ->update(['name' => $data['name']]);

            return response()->json([
                'success' => true,
                'message' => 'Biodata tersimpan',
                'url' => route('siswa.pendaftaran.index') . '?step=wali'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Gagal simpan biodata',
                'error' => $e->getMessage() // penting untuk debug
            ], 500);
        }
    }

    /* ======================================================
        STEP: WALI
    ====================================================== */

    public function wali(WaliRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'sekolah_asal' => 'nullable|string',
            'nilai_ijazah' => 'required|numeric',
            'nilai_rata' => 'required|numeric',
            'nilai_tka' => 'required|numeric',
            'nisn' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        try {
            $pendaftaran = $this->activePendaftaran();

            if (!$pendaftaran) {
                return response()->json([
                    'error' => 'Pendaftaran tidak aktif'
                ], 403);
            }

            $siswa = $this->getSiswa();

            if (!$siswa) {
                return response()->json([
                    'error' => 'Data siswa tidak ditemukan'
                ], 404);
            }

            $data = $validator->validated();
            $data['pendaftaran_id'] = $pendaftaran->id;

            $siswa->update($data);

            $data['pendaftaran_id'] = $pendaftaran->id;

            $data['is_save'] = true;
            $data['status'] = 'Menunggu Konfirmasi';

            $this->saveSiswa($data);

            return response()->json([
                'success' => true,
                'url' => route('siswa.pendaftaran.index')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal menyimpan data wali'
            ], 500);
        }
    }
}