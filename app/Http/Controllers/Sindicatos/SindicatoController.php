<?php

namespace App\Http\Controllers\Sindicatos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SindicatoController extends Controller
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
        //phpinfo();
        $teste = '';
        $ronaldo = 'oioi';
        $teste = 'Ronaldo';
        $teste .= ' ';
        $teste .= 'Quionha';
        $teste .= ' ';
        $teste .= 'de';
        $teste .= ' ';
        $teste .= 'Jesus';

        return view('sindicatos.sindicato');
    }
}