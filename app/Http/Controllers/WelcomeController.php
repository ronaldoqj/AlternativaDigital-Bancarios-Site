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
        session()->flash('typeNoticia', ['autorNoticia' => 'portal']);
        return $this->renderizaPagina($request);
    }

    public function indexSindicato(Request $request)
    {
        session()->flash('typeNoticia', ['autorNoticia' => 'sindicato']);
        return $this->renderizaPagina($request, true);
    }

    private function renderizaPagina($request, $sindicato = null)
    {
        $return = [];
        $noticia = new Noticia();
        $campanha = new Campanha();
        
        $return['bancoSelecionado'] = $this->getNameBank($request);
        $return['noticiaDestaqueFirst'] = $noticia->getDestaques()->first();
        $notIDs = [$return['noticiaDestaqueFirst']->id];
        $return['noticias'] = $noticia->getNoticias($request, $notIDs)->get();
        $return['campanha'] = $campanha->returnCampanhaVigente();

        return view('welcome')->withReturn($return)->withSindicato($sindicato);
    }

    private function getNameBank($request): string {
        $nameBank = 'Meu Banco';

        if ( is_numeric($request->input('banco')) )
        {
            $bancoPesquisa = new Banco();
            $bancoPesquisa = $bancoPesquisa->find($request->input('banco'));
            
            if ($bancoPesquisa)
            {
                if ($bancoPesquisa->count()) {
                    $nameBank = $bancoPesquisa->name;
                }
            }
        }

        return $nameBank;
    }

}
