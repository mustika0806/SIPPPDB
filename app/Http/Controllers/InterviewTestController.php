<?php

namespace App\Http\Controllers;

use App\Models\InterviewTest;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;

class InterviewTestController extends Controller
{
    public function index()
    {
        $interviews = InterviewTest::with('user')
            ->latest()
            ->get();

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
            'user_id' => 'required|exists:users,id',
            'interview_type' => 'required|in:online,offline',
            'interview_date' => 'required|date',
            'interview_time' => 'required',
            'meeting_link' => 'required_if:interview_type,online|nullable|url',
            'interview_place' => 'required_if:interview_type,offline|nullable|string|max:255',
        ]);

        $data = $request->only([
            'user_id',
            'interview_type',
            'interview_date',
            'interview_time',
            'meeting_link',
            'interview_place',
        ]);

        if ($request->interview_type == 'online') {
            $data['interview_place'] = null;
        }

        if ($request->interview_type == 'offline') {
            $data['meeting_link'] = null;
        }

        // Saat tambah data, wawancara baru sebatas jadwal
        $data['score'] = null;
        $data['notes'] = null;
        $data['status'] = 'terjadwal';

        InterviewTest::create($data);

        return redirect()->route('admin.interview.index')
            ->with('success', 'Jadwal wawancara berhasil ditambahkan.');
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
            'user_id' => 'required|exists:users,id',
            'interview_type' => 'required|in:online,offline',
            'interview_date' => 'required|date',
            'interview_time' => 'required',
            'meeting_link' => 'required_if:interview_type,online|nullable|url',
            'interview_place' => 'required_if:interview_type,offline|nullable|string|max:255',
            'score' => 'nullable|numeric|min:0|max:100',
            'notes' => 'nullable|string',
        ]);

        $interview = InterviewTest::findOrFail($id);

        $data = $request->only([
            'user_id',
            'interview_type',
            'interview_date',
            'interview_time',
            'meeting_link',
            'interview_place',
            'score',
            'notes',
        ]);

        if ($request->interview_type == 'online') {
            $data['interview_place'] = null;
        }

        if ($request->interview_type == 'offline') {
            $data['meeting_link'] = null;
        }

        // Status wawancara otomatis berdasarkan nilai
        if ($request->score === null || $request->score === '') {
            $data['score'] = null;
            $data['status'] = 'terjadwal';
        } elseif ($request->score >= 70) {
            $data['status'] = 'lulus';
        } else {
            $data['status'] = 'tidak_lulus';
        }

        $interview->update($data);

        // Sinkronkan nilai wawancara ke tabel siswas
        $siswa = Siswa::where('user_id', $request->user_id)->first();

        if ($siswa) {
            $siswa->update([
                'nilai_wawancara' => ($request->score === null || $request->score === '')
                    ? null
                    : $request->score,
            ]);
        }

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

    public function siswaIndex()
    {
        $interview = InterviewTest::with('user')
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        return view('home.siswa.interview.index', compact('interview'));
    }
}