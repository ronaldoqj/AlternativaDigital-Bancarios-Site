<?php

namespace App\Http\Controllers\Sindicatos;
use App\Http\Controllers\Controller;
use App\Models\Estado;

use Illuminate\Http\Request;

class SindicalizeSeController extends Controller
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
        $estados = new Estado();

        return view('sindicatos.sindicalize-se')->withEstados( $estados->orderBy('estado')->get() );
    }
}
