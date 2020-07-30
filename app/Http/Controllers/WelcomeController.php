<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Banco;
use Hamcrest\Type\IsNumeric;

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
    public function index(Request $request)
    {
        $return = [];
        $return['bancoSelecionado'] = 'Meu Banco';


        if (is_numeric($request->input('banco')))
        {
            $bancoPesquisa = new Banco();
            $bancoPesquisa = $bancoPesquisa->find($request->input('banco'));
            
            if ($bancoPesquisa->count()) {
                $return['bancoSelecionado'] = $bancoPesquisa->name;
            }
        }

        
        $noticia = new Noticia();
        $banco = new Banco();

        $return['noticiaDestaqueFirst'] = $noticia->listAllToSitePageWelcome('noticia-destaque')->first();
        $return['noticiaDestaque'] = $noticia->listAllToSitePageWelcome('noticia-destaque')->get();
        $return['noticias'] = $noticia->listAllToSitePageWelcome()->get();
        
        // $return['bancos'] = $banco->all();
        
        // $return['noticiaComImagem'] = $noticia->listAllToSitePageWelcome('noticia-imagem')->get();
        // $return['noticiaComPodcast'] = $noticia->listAllToSitePageWelcome('noticia-podcast')->get();
        // $return['noticiaComVideo'] = $noticia->listAllToSitePageWelcome('noticia-video')->get();
        // $return['noticiaSimples'] = $noticia->listAllToSitePageWelcome('noticia-simples')->get();
// dump($return['noticiaDestaqueFirst']);

// dump($return['noticiaDestaque']);
// dd($return['noticias']);
        return view('welcome')->withReturn($return);
    }
}
