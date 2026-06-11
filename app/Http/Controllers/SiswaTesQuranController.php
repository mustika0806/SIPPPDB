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
}