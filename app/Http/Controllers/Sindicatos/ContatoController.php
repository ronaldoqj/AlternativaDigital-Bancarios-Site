<?php

namespace App\Http\Controllers\Sindicatos;
use App\Http\Controllers\Controller;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
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
        $data = new Contato();

        return view('sindicatos.contato')->withData( $data->where('entity', $request->syndicate['id'])->first() );
    }
}
