<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;


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
     * Noticias
     * 
     * OBS: Neste controller é tratada tanto as noticias do Portal quanto dos Sindicatos
     *      É realizado o compoartilhamento do controller, ambos executam a função "renderizaPagina".
     *      O método "renderizaPagina" é responsavel por fazer os tratamentos necessários para a
     *      pesquisa da noticia.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request, $id = null, $title = '')
    {
        return $this->renderizaPagina($request, $id);
    }

    public function indexSindicato(Request $request, $id = null, $title = '')
    {
        return $this->renderizaPagina($request, $id, true);
    }

    private function renderizaPagina($request, $id = null, $sindicato = null)
    {
        $return = [];

        if (is_numeric($id))
        {
            $noticia = new Noticia();
            $noticia = $noticia->findById($id);

            if ($noticia) {
                $return['noticia'] = $noticia;

                $sugestoes = new Noticia();
                $sugestoes = $sugestoes->sugestoesDeNoticias($id)->get();
                $return['sugestoes'] = $sugestoes;
            }
        }

        if (! count($return)) {
            return redirect(url('/'));
        }
        
        return view('noticia')->withReturn($return)->withSindicato($sindicato);
    }


    /**
     * Metodos que serão deletados
     */
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
