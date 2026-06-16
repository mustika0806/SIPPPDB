<?php

namespace App\Http\Controllers;

use App\Http\Requests\BiodataRequest;
use App\Http\Requests\SekolahRequest;
use App\Http\Requests\SiswaPendaftaranRequest;
use App\Http\Requests\WaliRequest;
use App\Models\Kelas;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaPendaftaranController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::where('user_id', auth()->user()->id)->first();
        return view('home.siswa.pendaftaran.index', compact('kelas', 'siswa'));
    }
    public function store(SiswaPendaftaranRequest $request)
    {

        $siswa = $request->validated();

        try {
            // 1. Cek masa pendaftaran
            $pendaftaran = Pendaftaran::whereDate('mulai', '<=', today())
                ->whereDate('berakhir', '>=', today())
                ->first();

            if (!$pendaftaran) {
                return response()->json(['error' => 'Maaf kami sedang tidak membuka pendaftaran'], 400);
            }

            // 2. Cek ketersediaan kuota kelas
            $kelas = Kelas::findOrFail($request->kelas_id); // Ambil data kelas berdasarkan pilihan
            if ($kelas->kuota_tersedia <= 0) {
                return response()->json(['error' => 'Maaf, kuota untuk kelas ini sudah penuh'], 400);
            }

            $siswa['pendaftaran_id'] = $pendaftaran->id;
            $data_siswa = Siswa::firstWhere('user_id', auth()->user()->id);

            if ($data_siswa) {
                $data_siswa->update($siswa);
            } else {
                Siswa::create($siswa);
            }

            return response()->json(['success' => 'Data Siswa berhasil ditambahkan'], 200);
        } catch (\Exception $th) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $th->getMessage()], 500);
        }
    }
    public function biodata(BiodataRequest $request)
    {
        $siswa = $request->validated();
        try {
            $pendaftaran = Pendaftaran::whereDate('mulai', '<=', today())
                ->whereDate('berakhir', '>=', today())
                ->first();
            if (!$pendaftaran) {
                return response()->json(['error', 'Maaf kami sedang tidak membuka pendaftaran']);
            }
            $siswa['pendaftaran_id'] = $pendaftaran->id;
            $data_siswa = Siswa::firstWhere('user_id', auth()->user()->id);
            if ($data_siswa) {
                $data_siswa->update($siswa);
                User::where('id', auth()->user()->id)->update(['name' => $siswa['name']]);
            } else {
                Siswa::create($siswa);
            }
            return response()->json(['success' => 'Data Siswa berhasil ditambahkan', 'url' => route('siswa.pendaftaran.index') . '?step=wali'], 200);
        } catch (\Exception $th) {
            return response()->json(['error' => 'Data Siswa gagal ditambahkan'], 500);
        }
    }
    public function wali(Request $request)
    {
        $siswa = $request->validate([]); {
            $validator = Validator::make($request->all(), [
                'sekolah_asal' => [
                    'nullable',
                    'string',
                ],
                'nilai_rata' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 500);
            }
            $siswa['sekolah_asal'] = $request->sekolah_asal;
            $siswa['nilai_rata'] = $request->nilai_rata;
        } {
            $validator = Validator::make($request->all(), []);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 500);
            }
        }
        try {
            $pendaftaran = Pendaftaran::whereDate('mulai', '<=', today())
                ->whereDate('berakhir', '>=', today())
                ->first();
            if (!$pendaftaran) {
                return response()->json(['error', 'Maaf kami sedang tidak membuka pendaftaran']);
            }
            $siswa['pendaftaran_id'] = $pendaftaran->id;
            $data_siswa = Siswa::firstWhere('user_id', auth()->user()->id);
            if ($data_siswa) {
                $data_siswa->update($siswa);
            } else {
                return response()->json(['error' => 'Data Siswa tidak ditemukan'], 500);
            }
            return response()->json(['success' => 'Data Siswa berhasil ditambahkan', 'url' => route('siswa.pendaftaran.index') . '?step=sekolah'], 200);
        } catch (\Exception $th) {
            return response()->json(['error' => 'Data Siswa gagal ditambahkan'], 500);
        }
    }
    public function sekolah(SekolahRequest $request)
    {
        $siswa = $request->validated();
        try {
            $pendaftaran = Pendaftaran::whereDate('mulai', '<=', today())
                ->whereDate('berakhir', '>=', today())
                ->first();
            if (!$pendaftaran) {
                return response()->json(['error', 'Maaf kami sedang tidak membuka pendaftaran']);
            }
            $siswa['pendaftaran_id'] = $pendaftaran->id;
            $data_siswa = Siswa::firstWhere('user_id', auth()->user()->id);
            if ($data_siswa) {
                $siswa['is_save'] = true;
                $siswa['status'] = 'Menunggu Konfirmasi ';
                $data_siswa->update($siswa);
            } else {
                Siswa::create($siswa);
            }
            return response()->json(['success' => 'Data Siswa berhasil ditambahkan', 'url' => route('siswa.pendaftaran.index')], 200);
        } catch (\Exception $th) {
            return response()->json(['error' => 'Data Siswa gagal ditambahkan'], 500);
        }
    }
}