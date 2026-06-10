<?php

namespace App\Http\Controllers;

use App\Models\QuranTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaTesQuranController extends Controller
{
    public function index()
    {
        $tests = QuranTest::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('home.siswa.quran.index', compact('tests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'test_date' => 'required|date',
            'video' => 'required|mimes:mp4,mov,webm|max:51200',
        ]);

        $path = $request->file('video')->store('quran_tests', 'public');

        QuranTest::create([
            'user_id' => Auth::id(),
            'test_date' => $request->test_date,
            'video_path' => $path,
            'score' => null,
            'notes' => null,
        ]);

        return redirect()->route('siswa.tes.quran.index')
            ->with('success', 'Video tes Al-Qur’an berhasil dikirim.');
    }
}