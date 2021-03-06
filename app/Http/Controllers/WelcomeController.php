<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Banco;
use App\Models\Campanha;

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
            return redirect()->route('home', ['banco' => $request->input('banco') ?? null]);
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


    private function renderizaPagina($request, $sindicato = null, $idBanco = null)
    {
        $return = [];
        $return['bancoSelecionado'] = 'Meu Banco';

        if (is_numeric($request->input('banco')))
        {
                $bancoPesquisa = new Banco();
                $bancoPesquisa = $bancoPesquisa->find($request->input('banco'));
                if ($bancoPesquisa) {
                    if ($bancoPesquisa->count()) {
                        $return['bancoSelecionado'] = $bancoPesquisa->name;
                        $idBanco = $request->input('banco');
                    }
                }
                else
                {
                    if ($request->input('banco') == 0) {
                        $return['bancoSelecionado'] = 'Todos Bancos';
                    }
                }
            
        }
        
        $noticia = new Noticia();
        $banco = new Banco();
        $campanha = new Campanha();

        if ($request->input('banco') == 0) {
            $idBanco = $request->input('banco');
        }

        $return['noticiaDestaqueFirst'] = $noticia->listAllToSitePageWelcome('noticia-destaque')->first();
        $return['noticias'] = $noticia->listAllToSitePageWelcome('*', $return['noticiaDestaqueFirst'] ? $return['noticiaDestaqueFirst']->id : null, $idBanco)->get();
        $return['campanha'] = $campanha->returnCampanhaVigente();
        

        return view('welcome')->withReturn($return)->withSindicato($sindicato);
    }
}
