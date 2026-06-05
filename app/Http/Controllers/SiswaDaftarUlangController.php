<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use Illuminate\Http\Request;

class SiswaDaftarUlangController extends Controller
{
    public function index()
    {
        // Langsung ambil data login
        $user = auth()->user();

        // Cari data daftar ulang berdasarkan user_id, bukan siswa_id
        $daftar_ulang = DaftarUlang::where('user_id', $user->id)->first();

        // Kirim $user sebagai pengganti $siswa ke view
        return view('home.siswa.daftar_ulang.index', compact('daftar_ulang', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'nullable|in:Belum Bayar,Sudah Bayar',
            'bukti_transfer' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $user = auth()->user();
            $path = null;

            if ($request->hasFile('bukti_transfer')) {
                $file = $request->file('bukti_transfer');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('bukti_transfer', $filename, 'public');
            }

            $status = $request->status ?? 'Belum Bayar';

            // Cari berdasarkan user_id
            $daftar_ulang = DaftarUlang::where('user_id', $user->id)->first();

            if ($daftar_ulang) {
                $data = ['status' => $status];
                if ($path) {
                    $data['bukti_transfer'] = $path;
                }
                $daftar_ulang->update($data);
            } else {
                DaftarUlang::create([
                    'user_id' => $user->id, // Simpan user_id langsung
                    'code_transaksi' => $request->code_transaksi,
                    'nominal' => $request->nominal,
                    'tgl_daftar_ulang' => date('Y-m-d'),
                    'status' => $status,
                    'bukti_transfer' => $path
                ]);
            }

            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function approve($id)
    {
        $data = DaftarUlang::findOrFail($id);

        $data->update([
            'persetujuan' => 'disetujui',
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil disetujui');
    }

    public function tolak($id)
    {
        $data = DaftarUlang::findOrFail($id);

        $data->update([
            'persetujuan' => 'ditolak'
        ]);
        // optional: hapus file juga
        if ($data->bukti_transfer && \Storage::exists('public/' . $data->bukti_transfer)) {
            \Storage::delete('public/' . $data->bukti_transfer);
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data pembayaran ditolak & dihapus');
    }
}