<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuranTest;
use App\Models\User;

class AdminQuranTesController extends Controller
{
    public function index()
    {
        $tests = QuranTest::with('user')->latest()->get();
        return view('home.admin.quran.index', compact('tests'));
    }

    public function create()
    {
        $students = User::where('level', 'siswa')->get(); // ambil semua siswa
        return view('home.admin.quran.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'test_date' => 'required|date',
            'audio' => 'required|mimes:mp3,wav|max:10240',
        ]);

        $test = QuranTest::create([
            'user_id' => $request->user_id,
            'test_date' => $request->test_date,
        ]);

        $file = $request->file('audio');
        $path = $file->store('quran_tests');

        $test->update(['audio_path' => $path]);

        return redirect()->route('admin.quran.index')->with('success', 'Tes Quran berhasil diunggah.');
    }

    public function edit(QuranTest $quran)
    {
        $students = User::where('level', 'siswa')->get();
        return view('home.admin.quran.edit', compact('quran', 'students'));
    }

    public function update(Request $request, QuranTest $quran)
    {
        $request->validate([
            'score' => 'required|numeric|min:0|max:100',
            'notes' => 'nullable|string',
        ]);

        $quran->update($request->only('score', 'notes'));

        return redirect()->route('admin.quran.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy(QuranTest $quran)
    {
        $quran->delete();
        return back()->with('success', 'Data tes Quran dihapus.');
    }
}