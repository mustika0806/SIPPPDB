<?php

namespace App\Http\Controllers;

use App\Models\InterviewTest;
use App\Models\User;
use Illuminate\Http\Request;

class InterviewTestController extends Controller
{
    public function index()
    {
        $interviews = InterviewTest::with('user')->latest()->get();

        return view('home.admin.interview.index', compact('interviews'));
    }

    public function create()
    {
        $students = User::where('level', 'siswa')->get();

        return view('home.admin.interview.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'interview_date' => 'required|date',
            'score' => 'required|numeric|min:0|max:100',
            'notes' => 'nullable|string',
            'status' => 'required|in:belum,lulus,tidak_lulus',
        ]);

        InterviewTest::create([
            'user_id' => $request->user_id,
            'interview_date' => $request->interview_date,
            'score' => $request->score,
            'notes' => $request->notes,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.interview.index')
            ->with('success', 'Data wawancara berhasil disimpan.');
    }

    public function edit($id)
    {
        $interview = InterviewTest::findOrFail($id);
        $students = User::where('level', 'siswa')->get();

        return view('home.admin.interview.edit', compact('interview', 'students'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'interview_date' => 'required|date',
            'score' => 'required|numeric|min:0|max:100',
            'notes' => 'nullable|string',
            'status' => 'required|in:belum,lulus,tidak_lulus',
        ]);

        $interview = InterviewTest::findOrFail($id);

        $interview->update([
            'user_id' => $request->user_id,
            'interview_date' => $request->interview_date,
            'score' => $request->score,
            'notes' => $request->notes,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.interview.index')
            ->with('success', 'Data wawancara berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $interview = InterviewTest::findOrFail($id);
        $interview->delete();

        return redirect()->route('admin.interview.index')
            ->with('success', 'Data wawancara berhasil dihapus.');
    }
    // Tambahkan di class InterviewTestController
    public function siswaIndex()
{
    $interview = InterviewTest::with('user')
        ->where('user_id', auth()->id())
        ->latest()
        ->first();

    return view('home.siswa.interview.index', compact('interview'));
}
}