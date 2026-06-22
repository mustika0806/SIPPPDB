<?php

namespace App\Http\Controllers;

use App\Http\Requests\BiodataRequest;
use App\Http\Requests\SekolahRequest;
use App\Http\Requests\SiswaPendaftaranRequest;
use App\Models\Kelas;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaPendaftaranController extends Controller
{
    /* ======================================================
        HELPER FUNCTIONS
    ====================================================== */

    private function activePendaftaran()
    {
        return Pendaftaran::whereDate('mulai', '<=', today())
            ->whereDate('berakhir', '>=', today())
            ->first();
    }

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
        STEP: DATA SISWA DASAR
    ====================================================== */

    public function store(SiswaPendaftaranRequest $request)
    {
        dd($request->validated());
        $data = $request->validated();

        try {
            $pendaftaran = $this->activePendaftaran();

            if (!$pendaftaran) {
                return response()->json([
                    'error' => 'Pendaftaran sedang tidak dibuka'
                ], 400);
            }

            $kelas = Kelas::findOrFail($request->kelas_id);

            if ($kelas->kuota_tersedia <= 0) {
                return response()->json([
                    'error' => 'Kuota kelas sudah penuh'
                ], 400);
            }

            $data['pendaftaran_id'] = $pendaftaran->id;

            $this->saveSiswa($data);

            return response()->json([
                'success' => true,
                'message' => 'Data siswa berhasil disimpan'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
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

    public function wali(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sekolah_asal' => 'nullable|string',
            'nilai_rata' => 'required|numeric',
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

            return response()->json([
                'success' => true,
                'url' => route('siswa.pendaftaran.index') . '?step=sekolah'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal menyimpan data wali'
            ], 500);
        }
    }

    /* ======================================================
        STEP: SEKOLAH
    ====================================================== */

    public function sekolah(SekolahRequest $request)
    {
        $data = $request->validated();

        try {
            $pendaftaran = $this->activePendaftaran();

            if (!$pendaftaran) {
                return response()->json([
                    'error' => 'Pendaftaran tidak aktif'
                ], 403);
            }

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
                'error' => 'Gagal menyimpan data sekolah'
            ], 500);
        }
    }
}