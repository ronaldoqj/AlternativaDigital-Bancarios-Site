<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcordoEConvencao;

class AcordosEConvencoesController extends Controller
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
        $acordoEConvencao = new AcordoEConvencao();
        $years = $acordoEConvencao->listAllToSiteAcordosEConvencoes();

        //dd($years);

        return view('acordos-e-convencoes');
    }
}
