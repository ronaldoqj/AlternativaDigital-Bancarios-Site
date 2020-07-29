<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class WelcomeController extends Controller
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
        $return = [];
        $noticia = new Noticia();

        $return['noticiaDestaqueFirst'] = $noticia->listAllToAdmPageNoticias('noticia-destaque')->first();
        $return['noticiaDestaque'] = $noticia->listAllToAdmPageNoticias('noticia-destaque')->get()->toJson();
        $return['noticiaComImagem'] = $noticia->listAllToAdmPageNoticias('noticia-imagem')->get()->toJson();
        $return['noticiaComPodcast'] = $noticia->listAllToAdmPageNoticias('noticia-podcast')->get()->toJson();
        $return['noticiaComVideo'] = $noticia->listAllToAdmPageNoticias('noticia-video')->get()->toJson();
        $return['noticiaSimples'] = $noticia->listAllToAdmPageNoticias('noticia-simples')->get()->toJson();
// dump($return['noticiaDestaqueFirst']);
        return view('welcome')->withReturn($return);
    }
}
