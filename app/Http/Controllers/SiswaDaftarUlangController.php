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
            'status' => 'required|in:Belum Bayar,Sudah Bayar',
            'bukti_transfer' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $path = null;
            if ($request->hasFile('bukti_transfer')) {
                $file = $request->file('bukti_transfer');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('bukti_transfer', $filename, 'public');
            }

            $daftar_ulang = DaftarUlang::where('siswa_id', $siswa->id)->first();

            if ($daftar_ulang) {
                $data = [
                    'status' => $request->status,
                ];

                // hanya update file kalau ada upload baru
                if ($path) {
                    $data['bukti_transfer'] = $path;
                }

                $daftar_ulang->update($data);

            } else {
                DaftarUlang::create([
                    'siswa_id' => $siswa->id,
                    'code_transaksi' => $request->code_transaksi,
                    'nominal' => $request->nominal,
                    'tgl_daftar_ulang' => date('Y-m-d'),
                    'status' => $request->status,
                    'bukti_transfer' => $path,
                ]);
            }

            return redirect()->back()->with('success', 'Berhasil melakukan pembayaran');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengupload bukti bayar');
        }
    }
    public function approve($id)
    {
        $data = DaftarUlang::findOrFail($id);

        $data->update([
            'status' => 'Sudah Bayar' // atau 'Disetujui' kalau mau beda
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil di-approve');
    }

    public function tolak($id)
    {
        $data = DaftarUlang::findOrFail($id);

        // optional: hapus file juga
        if ($data->bukti_transfer && \Storage::exists('public/' . $data->bukti_transfer)) {
            \Storage::delete('public/' . $data->bukti_transfer);
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data pembayaran ditolak & dihapus');
    }
}
