<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Banco;
use App\Models\Campanha;
use App\Models\Pagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private Pagination $pagination;
    private bool $isSindicate = false;

    public function __construct()
    {
        $this->pagination = new Pagination();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $this->pagination->page = 1;
        $return = $this->renderizaPagina($request);
        
        // Pagination
        $this->pagination->setResult($return['data']['noticias']);
        $this->pagination->get();
        $return['data']['noticias'] = $this->pagination->items;

        return $return['view']->withReturn($return['data'])
                              ->withSindicato(null);
    }

    public function indexSindicato(Request $request)
    {
        $this->pagination->page = 1;
        $this->isSindicate = true;

        $return = $this->renderizaPagina($request);

        // Pagination
        $this->pagination->setResult($return['data']['noticias']);
        $this->pagination->get();
        $return['data']['noticias'] = $this->pagination->items;

        return $return['view']->withReturn($return['data'])
                              ->withSindicato(true);
    }

    public function ajax_pagination(Request $request)
    {
        $this->pagination->setPage( $request->input('page') ?? 1 );
        
        $return = $this->renderizaPagina($request);
        
        $this->pagination->setResult($return['data']['noticias']);
        $this->pagination->get();

        $linkComplemento = request()->syndicate ? 'sindicato/' : '';
        foreach($this->pagination->items as $key => $item)
        {
            $this->pagination->items[$key]->extraLink = url("/{$linkComplemento}noticia/{$item->id}/" . Str::slug($item->titulo, '-'));
            $this->pagination->items[$key]->extraAssetUrl = url(asset("/{$item->fileImagemDestaque_pathfile}/{$item->fileImagemDestaque_namefile}"));
            $this->pagination->items[$key]->extraData = \Carbon\Carbon::parse($item->dataInclusao)->format('d/m/Y');
        }

        return json_encode($this->pagination);
    }

    private function renderizaPagina($request)
    {
        $return = [
            'view' => view('welcome'),
            'data' => null
        ];
        $notIDs = [];
        $noticia = new Noticia();
        $campanha = new Campanha();
        
        $return['data']['bancoSelecionado']     = $this->getNameBank($request);
        $return['data']['noticiaDestaqueFirst'] = $noticia->getDestaques()->first();
        if ($return['data']['noticiaDestaqueFirst']) {
            $notIDs[] = $return['data']['noticiaDestaqueFirst']->id;
        }
        $return['data']['noticias']             = $noticia->getNoticias($request, $notIDs);
        $return['data']['campanha']             = $this->isSindicate ? [] : $campanha->returnCampanhaVigente();

        return $return;
    }

    private function getNameBank($request): string
    {
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
