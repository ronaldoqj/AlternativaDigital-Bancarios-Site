<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return 'index';
    }

    public function withImageDestaque() {
        return view('noticia-with-image-destaque');
    }

    public function withImage()
    {
        return view('noticia-with-image');
    }
    
    public function withVideo()
    {
        return view('noticia-with-video');
    }

    public function withAudio()
    {
        return view('noticia-with-audio');
    }

    public function withOnlyText()
    {
        return view('noticia-only-text');
    }
}
