<?php

namespace App\Http\Controllers;

use App\Models\QuranTes;
use App\Models\User;
use Illuminate\Http\Request;

class AdminQuranTesController extends Controller
{
    public function index()
    {
        $tests = QuranTes::with('user')->latest()->get();
        return view('home.admin.quran.index', compact('tests'));
    }

    public function create()
    {
        $students = User::where('level', 'siswa')->get();
        return view('home.admin.quran.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'test_date' => 'required|date',
            'video' => 'required|mimes:mp4,mp3,wav|max:51200', // 50MB
        ]);

        $path = $request->file('video')->store('quran_tests', 'public');

        QuranTes::create([
            'user_id' => $request->user_id,
            'test_date' => $request->test_date,
            'video_path' => $path,
        ]);

        return redirect()->route('admin.quran.index')->with('success', 'Tes Quran berhasil ditambahkan.');
    }

    public function edit(QuranTes $quranTest)
    {
        $students = User::where('level', 'siswa')->get();
        return view('home.admin.quran.edit', compact('quranTest', 'students'));
    }


    public function update(Request $request, QuranTes $quran)
    {
        $request->validate([
            'score' => 'required|numeric|min:0|max:100',
            'notes' => 'nullable|string',
        ]);

        $quran->update($request->only('score', 'notes'));

        return redirect()->route('admin.quran.index')
            ->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy(QuranTes $quranTest)
    {
        $quranTest->delete();
        return back()->with('success', 'Tes Quran berhasil dihapus.');
    }
}