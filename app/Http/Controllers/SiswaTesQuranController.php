<?php

namespace App\Http\Controllers;

use App\Models\QuranTes;
use Illuminate\Http\Request;

class SiswaTesQuranController extends Controller
{
    public function index()
    {
        $tests = QuranTes::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('home.siswa.quran.index', compact('tests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'test_date' => 'required|date',
            'juz' => 'required|integer|min:1|max:30',
            'surat' => 'required|string|max:100',
            'ayat' => 'required|string|max:100',
            'keterangan_bacaan' => 'nullable|string',
            'video_path' => 'required|file|mimes:mp4|max:51200',
        ], [
            'test_date.required' => 'Tanggal tes wajib diisi.',
            'juz.required' => 'Juz yang dibaca wajib dipilih.',
            'surat.required' => 'Nama surat wajib diisi.',
            'ayat.required' => 'Ayat yang dibaca wajib diisi.',
            'video_path.required' => 'Video tes membaca Al-Qur’an wajib diupload.',
            'video_path.mimes' => 'Video harus berformat MP4.',
            'video_path.max' => 'Ukuran video maksimal 50 MB.',
        ]);

        $path = $request->file('video_path')->store('quran_tests', 'public');

        QuranTes::create([
            'user_id' => auth()->id(),
            'test_date' => $request->test_date,
            'juz' => $request->juz,
            'surat' => $request->surat,
            'ayat' => $request->ayat,
            'keterangan_bacaan' => $request->keterangan_bacaan,
            'video_path' => $path,
            'score' => null,
            'notes' => null,
            'status' => 'Menunggu Penilaian',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Video tes membaca Al-Qur’an berhasil diupload.');
    }
}