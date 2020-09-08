<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Banco;

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
        if (session()->has('sindicato'))
        {
            return redirect()->route('sindicato-home');
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function home(Request $request)
    {
        session()->flash('typeNoticia', ['autorNoticia' => 'portal']);
        return $this->renderizaPagina($request);
    }


    public function indexSindicato(Request $request)
    {
        session()->flash('typeNoticia', ['autorNoticia' => 'sindicato']);
        return $this->renderizaPagina($request, true);
    }

    public function homeSindicato(Request $request)
    {
        session()->flash('typeNoticia', ['autorNoticia' => 'sindicato']);
        return $this->renderizaPagina($request, true);
    }


    private function renderizaPagina($request, $sindicato = null)
    {
        $return = [];
        $return['bancoSelecionado'] = 'Meu Banco';
        $idBanco = null;

        if (is_numeric($request->input('banco')))
        {
            $bancoPesquisa = new Banco();
            $bancoPesquisa = $bancoPesquisa->find($request->input('banco'));
            
            if ($bancoPesquisa->count()) {
                $return['bancoSelecionado'] = $bancoPesquisa->name;
                $idBanco = $request->input('banco');
            }
        }

        
        $noticia = new Noticia();
        $banco = new Banco();

        $return['noticiaDestaqueFirst'] = $noticia->listAllToSitePageWelcome('noticia-destaque')->first();
        $return['noticias'] = $noticia->listAllToSitePageWelcome('*', $return['noticiaDestaqueFirst'] ? $return['noticiaDestaqueFirst']->id : null, $idBanco)->get();

        return view('welcome')->withReturn($return)->withSindicato($sindicato);
    }
}
