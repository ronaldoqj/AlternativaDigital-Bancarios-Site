<?php

namespace App\Http\Controllers;
use App\Models\Sindicato;

use Illuminate\Http\Request;

class MeuSindicatoController extends Controller
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
        $Sindicato = new Sindicato();

        $return['list'] = $Sindicato->listAllToSitePageSindicatos()->get()->toArray();

        return view('meu-sindicato')->withReturn($return);
    }
}
