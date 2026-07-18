<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminPendaftaranController extends Controller
{
    /**
     * Menampilkan seluruh jadwal PPDB.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Hanya mengambil data yang merupakan jadwal PPDB
        |--------------------------------------------------------------------------
        | Tabel pendaftarans juga memiliki data identitas pendaftar.
        | Karena itu, data difilter berdasarkan kolom jadwal.
        */
        $pendaftaran = Pendaftaran::whereNotNull('gelombang')
            ->orWhereNotNull('tanggal_buka_pendaftaran')
            ->orderByDesc('tanggal_buka_pendaftaran')
            ->get();

        return view(
            'home.admin.pendaftaran.index',
            compact('pendaftaran')
        );
    }

    /**
     * Menyimpan jadwal PPDB baru.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validasi seluruh jadwal
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate(
            [
                'gelombang' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'tanggal_buka_pendaftaran' => [
                    'required',
                    'date',
                ],

                'tanggal_akhir_pendaftaran' => [
                    'required',
                    'date',
                    'after_or_equal:tanggal_buka_pendaftaran',
                ],

                'tanggal_buka_seleksi' => [
                    'required',
                    'date',
                    'after:tanggal_akhir_pendaftaran',
                ],

                'tanggal_akhir_seleksi' => [
                    'required',
                    'date',
                    'after_or_equal:tanggal_buka_seleksi',
                ],

                'tanggal_buka_pengumuman' => [
                    'required',
                    'date',
                    'after:tanggal_akhir_seleksi',
                ],

                'tanggal_akhir_pengumuman' => [
                    'required',
                    'date',
                    'after_or_equal:tanggal_buka_pengumuman',
                ],

                'tahun_akademik' => [
                    'required',
                    'string',
                    'max:20',
                ],

                'status' => [
                    'required',
                    'in:Aktif,Tidak Aktif',
                ],
            ],
            [
                'gelombang.required' =>
                    'Nama gelombang wajib diisi.',

                'gelombang.string' =>
                    'Nama gelombang harus berupa teks.',

                'gelombang.max' =>
                    'Nama gelombang maksimal 100 karakter.',

                'tanggal_buka_pendaftaran.required' =>
                    'Tanggal buka pendaftaran wajib diisi.',

                'tanggal_buka_pendaftaran.date' =>
                    'Tanggal buka pendaftaran tidak valid.',

                'tanggal_akhir_pendaftaran.required' =>
                    'Tanggal akhir pendaftaran wajib diisi.',

                'tanggal_akhir_pendaftaran.date' =>
                    'Tanggal akhir pendaftaran tidak valid.',

                'tanggal_akhir_pendaftaran.after_or_equal' =>
                    'Tanggal akhir pendaftaran tidak boleh sebelum tanggal buka pendaftaran.',

                'tanggal_buka_seleksi.required' =>
                    'Tanggal buka seleksi wajib diisi.',

                'tanggal_buka_seleksi.date' =>
                    'Tanggal buka seleksi tidak valid.',

                'tanggal_buka_seleksi.after' =>
                    'Tanggal buka seleksi harus setelah tanggal akhir pendaftaran.',

                'tanggal_akhir_seleksi.required' =>
                    'Tanggal akhir seleksi wajib diisi.',

                'tanggal_akhir_seleksi.date' =>
                    'Tanggal akhir seleksi tidak valid.',

                'tanggal_akhir_seleksi.after_or_equal' =>
                    'Tanggal akhir seleksi tidak boleh sebelum tanggal buka seleksi.',

                'tanggal_buka_pengumuman.required' =>
                    'Tanggal buka pengumuman wajib diisi.',

                'tanggal_buka_pengumuman.date' =>
                    'Tanggal buka pengumuman tidak valid.',

                'tanggal_buka_pengumuman.after' =>
                    'Tanggal buka pengumuman harus setelah tanggal akhir seleksi.',

                'tanggal_akhir_pengumuman.required' =>
                    'Tanggal akhir pengumuman wajib diisi.',

                'tanggal_akhir_pengumuman.date' =>
                    'Tanggal akhir pengumuman tidak valid.',

                'tanggal_akhir_pengumuman.after_or_equal' =>
                    'Tanggal akhir pengumuman tidak boleh sebelum tanggal buka pengumuman.',

                'tahun_akademik.required' =>
                    'Tahun akademik wajib diisi.',

                'tahun_akademik.string' =>
                    'Tahun akademik harus berupa teks.',

                'tahun_akademik.max' =>
                    'Tahun akademik maksimal 20 karakter.',

                'status.required' =>
                    'Status jadwal wajib dipilih.',

                'status.in' =>
                    'Status jadwal yang dipilih tidak valid.',
            ]
        );

        try {
            /*
            |--------------------------------------------------------------------------
            | Simpan jadwal baru
            |--------------------------------------------------------------------------
            */
            Pendaftaran::create([
                'gelombang' =>
                    $validated['gelombang'],

                'tanggal_buka_pendaftaran' =>
                    $validated['tanggal_buka_pendaftaran'],

                'tanggal_akhir_pendaftaran' =>
                    $validated['tanggal_akhir_pendaftaran'],

                'tanggal_buka_seleksi' =>
                    $validated['tanggal_buka_seleksi'],

                'tanggal_akhir_seleksi' =>
                    $validated['tanggal_akhir_seleksi'],

                'tanggal_buka_pengumuman' =>
                    $validated['tanggal_buka_pengumuman'],

                'tanggal_akhir_pengumuman' =>
                    $validated['tanggal_akhir_pengumuman'],

                'tahun_akademik' =>
                    $validated['tahun_akademik'],

                'status' =>
                    $validated['status'],
            ]);

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Jadwal pendaftaran berhasil ditambahkan.'
                );
        } catch (\Throwable $error) {
            report($error);

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Jadwal pendaftaran gagal ditambahkan.'
                );
        }
    }

    /**
     * Memperbarui jadwal PPDB.
     */
    public function update(
        Request $request,
        Pendaftaran $pendaftaran
    ) {
        /*
        |--------------------------------------------------------------------------
        | Validasi seluruh jadwal
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate(
            [
                'gelombang' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'tanggal_buka_pendaftaran' => [
                    'required',
                    'date',
                ],

                'tanggal_akhir_pendaftaran' => [
                    'required',
                    'date',
                    'after_or_equal:tanggal_buka_pendaftaran',
                ],

                'tanggal_buka_seleksi' => [
                    'required',
                    'date',
                    'after:tanggal_akhir_pendaftaran',
                ],

                'tanggal_akhir_seleksi' => [
                    'required',
                    'date',
                    'after_or_equal:tanggal_buka_seleksi',
                ],

                'tanggal_buka_pengumuman' => [
                    'required',
                    'date',
                    'after:tanggal_akhir_seleksi',
                ],

                'tanggal_akhir_pengumuman' => [
                    'required',
                    'date',
                    'after_or_equal:tanggal_buka_pengumuman',
                ],

                'tahun_akademik' => [
                    'required',
                    'string',
                    'max:20',
                ],

                'status' => [
                    'required',
                    'in:Aktif,Tidak Aktif',
                ],
            ],
            [
                'gelombang.required' =>
                    'Nama gelombang wajib diisi.',

                'gelombang.string' =>
                    'Nama gelombang harus berupa teks.',

                'gelombang.max' =>
                    'Nama gelombang maksimal 100 karakter.',

                'tanggal_buka_pendaftaran.required' =>
                    'Tanggal buka pendaftaran wajib diisi.',

                'tanggal_buka_pendaftaran.date' =>
                    'Tanggal buka pendaftaran tidak valid.',

                'tanggal_akhir_pendaftaran.required' =>
                    'Tanggal akhir pendaftaran wajib diisi.',

                'tanggal_akhir_pendaftaran.date' =>
                    'Tanggal akhir pendaftaran tidak valid.',

                'tanggal_akhir_pendaftaran.after_or_equal' =>
                    'Tanggal akhir pendaftaran tidak boleh sebelum tanggal buka pendaftaran.',

                'tanggal_buka_seleksi.required' =>
                    'Tanggal buka seleksi wajib diisi.',

                'tanggal_buka_seleksi.date' =>
                    'Tanggal buka seleksi tidak valid.',

                'tanggal_buka_seleksi.after' =>
                    'Tanggal buka seleksi harus setelah tanggal akhir pendaftaran.',

                'tanggal_akhir_seleksi.required' =>
                    'Tanggal akhir seleksi wajib diisi.',

                'tanggal_akhir_seleksi.date' =>
                    'Tanggal akhir seleksi tidak valid.',

                'tanggal_akhir_seleksi.after_or_equal' =>
                    'Tanggal akhir seleksi tidak boleh sebelum tanggal buka seleksi.',

                'tanggal_buka_pengumuman.required' =>
                    'Tanggal buka pengumuman wajib diisi.',

                'tanggal_buka_pengumuman.date' =>
                    'Tanggal buka pengumuman tidak valid.',

                'tanggal_buka_pengumuman.after' =>
                    'Tanggal buka pengumuman harus setelah tanggal akhir seleksi.',

                'tanggal_akhir_pengumuman.required' =>
                    'Tanggal akhir pengumuman wajib diisi.',

                'tanggal_akhir_pengumuman.date' =>
                    'Tanggal akhir pengumuman tidak valid.',

                'tanggal_akhir_pengumuman.after_or_equal' =>
                    'Tanggal akhir pengumuman tidak boleh sebelum tanggal buka pengumuman.',

                'tahun_akademik.required' =>
                    'Tahun akademik wajib diisi.',

                'tahun_akademik.string' =>
                    'Tahun akademik harus berupa teks.',

                'tahun_akademik.max' =>
                    'Tahun akademik maksimal 20 karakter.',

                'status.required' =>
                    'Status jadwal wajib dipilih.',

                'status.in' =>
                    'Status jadwal yang dipilih tidak valid.',
            ]
        );

        try {
            /*
            |--------------------------------------------------------------------------
            | Perbarui jadwal
            |--------------------------------------------------------------------------
            */
            $pendaftaran->update([
                'gelombang' =>
                    $validated['gelombang'],

                'tanggal_buka_pendaftaran' =>
                    $validated['tanggal_buka_pendaftaran'],

                'tanggal_akhir_pendaftaran' =>
                    $validated['tanggal_akhir_pendaftaran'],

                'tanggal_buka_seleksi' =>
                    $validated['tanggal_buka_seleksi'],

                'tanggal_akhir_seleksi' =>
                    $validated['tanggal_akhir_seleksi'],

                'tanggal_buka_pengumuman' =>
                    $validated['tanggal_buka_pengumuman'],

                'tanggal_akhir_pengumuman' =>
                    $validated['tanggal_akhir_pengumuman'],

                'tahun_akademik' =>
                    $validated['tahun_akademik'],

                'status' =>
                    $validated['status'],
            ]);

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Jadwal pendaftaran berhasil diubah.'
                );
        } catch (\Throwable $error) {
            report($error);

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Jadwal pendaftaran gagal diubah.'
                );
        }
    }

    /**
     * Menghapus jadwal PPDB.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        try {
            $pendaftaran->delete();

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Jadwal pendaftaran berhasil dihapus.'
                );
        } catch (\Throwable $error) {
            report($error);

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Jadwal pendaftaran gagal dihapus.'
                );
        }
    }
}