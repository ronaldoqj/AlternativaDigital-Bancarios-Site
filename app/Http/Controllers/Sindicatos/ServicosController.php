<?php

namespace App\Http\Controllers\Sindicatos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\Convenio;

class ServicosController extends Controller
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
        $data = new Servico();

        /**
         * Listagem dos convenios organizados por categoria
         * dentro de cada categoria contem a listagem dos convenios
         */
        $entity = $request->syndicate['id'];
        $convenio = new Convenio();
        $getListCategoriasComConvenios = $convenio->getListCategoriasComConvenios($entity);

        return view('sindicatos.servicos')->withData( $data->where('entity', $request->syndicate['id'])->first() )
                                          ->withListConvenios($getListCategoriasComConvenios);
    }
}
