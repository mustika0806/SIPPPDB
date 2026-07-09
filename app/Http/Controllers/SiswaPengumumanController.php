<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

class SiswaPengumumanController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('user', 'kelas')
            ->where('user_id', auth()->id())
            ->first();

        return view('home.siswa.pengumuman.index', compact('siswa'));
    }
}