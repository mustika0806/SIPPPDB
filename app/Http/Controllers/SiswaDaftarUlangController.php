<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaDaftarUlangController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('user_id', auth()->user()->id)->first();
        $daftar_ulang = DaftarUlang::where('siswa_id', $siswa->id)->first();
        return view('home.siswa.daftar_ulang.index', compact('daftar_ulang', 'siswa'));
    }
    public function store(Request $request, Siswa $siswa)
    {
        $request->validate([
            'status' => 'required|in:Belum Bayar,Sudah Bayar'
        ]);
        try {
            $daftar_ulang = DaftarUlang::where('siswa_id', $siswa->id)->first();
            if ($daftar_ulang) {
                $daftar_ulang->update([
                    'status' => $request->status,
                ]);
            } else {
                DaftarUlang::create([
                    'siswa_id' => $siswa->id,
                    'code_transaksi' => $request->code_transaksi,
                    'nominal' => $request->nominal,
                    'tgl_daftar_ulang' => date('Y-m-d'),
                    'status' => $request->status,
                ]);
            }
            return redirect()->back()->with('success', 'Berhasil melakukan pembayaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengupload bukti bayar');
        }
    }
}
