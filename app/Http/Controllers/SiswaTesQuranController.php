<?php

namespace App\Http\Controllers;

use App\Models\QuranTes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaTesQuranController extends Controller
{
    public function index()
    {
        $tests = QuranTes::where('user_id', Auth::id())->latest()->get();
        return view('home.siswa.quran.index', compact('tests'));
    }

    public function store(Request $request)
    {
        // Sesuaikan validasi (pastikan name pada form HTML adalah video_path)
        $request->validate([
            'test_date' => 'required',
            'video_path' => 'required|mimes:mp4,mov,webm,mp3,wav|max:50740',
        ]);

        // Simpan file ke storage/app/public/quran_tests
        $path = $request->file('video_path')->store('quran_tests', 'public');

        // Simpan path ke database
        QuranTes::create([
            'user_id' => Auth::id(),
            'test_date' => $request->test_date,
            'video_path' => $path, // Contoh hasil: "quran_tests/nama_file.mp4"
        ]);
        return redirect()->back()->with('success', 'Video berhasil ditambahkan');
    }
}