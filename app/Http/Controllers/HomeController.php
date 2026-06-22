<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $galeries = Galeri::all();
        $posts = Post::latest()->take(3)->get();
        $gelombangs = Pendaftaran::whereNotNull('mulai')
            ->whereNotNull('berakhir')
            ->orderBy('mulai', 'asc')
            ->get();

        $jadwalAktif = Pendaftaran::whereDate('mulai', '<=', Carbon::today())
            ->whereDate('berakhir', '>=', Carbon::today())
            ->orderBy('mulai', 'asc')
            ->first();
        return view('index', compact('galeries', 'posts', 'gelombangs', 'jadwalAktif'));
    }
    public function blog()
    {
        $posts = Post::latest()->paginate(3);
        return view('blog.list', compact('posts'));
    }
    public function post(Post $post)
    {
        return view('blog.single', compact('post'));
    }
    public function galeri()
    {
        $galeries = Galeri::all();
        return view('galeri', compact('galeries'));
    }
}
