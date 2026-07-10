<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        // Galeri dibuat aman agar tidak error jika model/tabel tidak ada
        $galeries = collect();

        if (
            class_exists(\App\Models\Galeri::class) &&
            Schema::hasTable('galeris')
        ) {
            $galeries = \App\Models\Galeri::all();
        }

        // Post/berita tidak dipakai, jadi dibuat kosong
        $posts = collect();

        // Jadwal pendaftaran / gelombang
        $gelombangs = collect();

        if (
            class_exists(\App\Models\Pendaftaran::class) &&
            Schema::hasTable('pendaftarans')
        ) {
            $gelombangs = \App\Models\Pendaftaran::whereNotNull('mulai')
                ->whereNotNull('berakhir')
                ->orderBy('mulai', 'asc')
                ->get();
        }

        $today = Carbon::today();

        $jadwalAktif = $gelombangs
            ->filter(function ($gelombang) use ($today) {
                if (empty($gelombang->mulai) || empty($gelombang->berakhir)) {
                    return false;
                }

                $mulai = Carbon::parse($gelombang->mulai);
                $berakhir = Carbon::parse($gelombang->berakhir);

                return $today->between($mulai, $berakhir);
            })
            ->sortBy('mulai')
            ->first();

        return view('index', compact(
            'galeries',
            'posts',
            'gelombangs',
            'jadwalAktif'
        ));
    }

    public function blog()
    {
        return redirect()->route('home');
    }

    public function post($post = null)
    {
        return redirect()->route('home');
    }

    public function galeri()
    {
        $galeries = collect();

        if (
            class_exists(\App\Models\Galeri::class) &&
            Schema::hasTable('galeris')
        ) {
            $galeries = \App\Models\Galeri::all();
        }

        return view('galeri', compact('galeries'));
    }
}