<?php

namespace App\Http\Controllers\Sindicatos;
use App\Http\Controllers\Controller;

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
    public function index()
    {
        /**
         * Redireciona para o Portal caso não exista o subdominio acessado
         */
        if ( ! session()->has('sindicato') ) { return redirect(env('APP_URL')); }

        return view('sindicatos.contato');
    }
}
