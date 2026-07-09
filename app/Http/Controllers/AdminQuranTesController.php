<?php

namespace App\Http\Controllers;

use App\Models\QuranTes;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminQuranTesController extends Controller
{
    public function index()
    {
        $tests = QuranTes::with('user')
            ->latest()
            ->get();

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
            'juz' => 'nullable|integer|min:1|max:30',
            'surat' => 'nullable|string|max:100',
            'ayat' => 'nullable|string|max:100',
            'keterangan_bacaan' => 'nullable|string',
            'video' => 'required|mimes:mp4,mov,webm|max:51200',
        ]);

        $path = $request->file('video')->store('quran_tests', 'public');

        QuranTes::create([
            'user_id' => $request->user_id,
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
            ->route('admin.quran.index')
            ->with('success', 'Tes Qur’an berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $quranTest = QuranTes::with('user')->findOrFail($id);
        $students = User::where('level', 'siswa')->get();

        return view('home.admin.quran.edit', compact('quranTest', 'students'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'score' => 'required|numeric|min:0|max:100',
            'notes' => 'nullable|string',
        ], [
            'score.required' => 'Nilai tes Qur’an wajib diisi.',
            'score.numeric' => 'Nilai harus berupa angka.',
            'score.min' => 'Nilai minimal 0.',
            'score.max' => 'Nilai maksimal 100.',
        ]);

        $quranTest = QuranTes::findOrFail($id);

        $quranTest->update([
            'score' => $request->score,
            'notes' => $request->notes,
            'status' => 'Sudah Dinilai',
        ]);

        $siswa = Siswa::where('user_id', $quranTest->user_id)->first();

        if ($siswa) {
            $siswa->update([
                'nilai_quran' => $request->score,
            ]);
        }

        return redirect()
            ->route('admin.quran.index')
            ->with('success', 'Nilai tes Qur’an berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $quranTest = QuranTes::findOrFail($id);

        if ($quranTest->video_path && Storage::disk('public')->exists($quranTest->video_path)) {
            Storage::disk('public')->delete($quranTest->video_path);
        }

        $quranTest->delete();

        return redirect()
            ->route('admin.quran.index')
            ->with('success', 'Tes Qur’an berhasil dihapus.');
    }
}