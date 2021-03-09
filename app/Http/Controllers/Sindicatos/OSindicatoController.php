<?php

namespace App\Http\Controllers\Sindicatos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Instituicao;

class OSindicatoController extends Controller
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
        $data = new Instituicao();

        return view('sindicatos.o-sindicato')->withData( $data->find($request->syndicate['id']) );
    }
}
