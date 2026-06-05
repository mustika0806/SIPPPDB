<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaKelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('home.siswa.kelas.index', compact('kelas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:50',
            'deskripsi_jurusan' => 'required|string|max:50',
            'kuota_tersedia' => 'required',
        ]);
        try {
            Kelas::create([
                'nama_jurusan' => $request->nama_jurusan,
                'deskripsi_jurusan' => $request->deskripsi_jurusan,
                'kuota_tersedia' => $request->kuota_tersedia,
            ]);
            return redirect()->back()->with('success', 'Data jurusan berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data jurusan gagal ditambahkan');
        }
    }
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:50',
            'deskripsi_jurusan' => 'required|string|max:50',
            'kuota_tersedia' => 'required',
        ]);
        try {
            $kelas->update([
                'nama_jurusan' => $request->nama_jurusan,
                'deskripsi_jurusan' => $request->deskripsi_jurusan,
                'kuota_tersedia' => $request->kuota_tersedia,
            ]);
            return redirect()->back()->with('success', 'Data kelas berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data kelas gagal diubah');
        }
    }
    public function destroy(Kelas $kelas)
    {
        try {
            $kelas->delete();
            return redirect()->back()->with('success', 'Data kelas berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data kelas gagal dihapus');
        }
    }
}
