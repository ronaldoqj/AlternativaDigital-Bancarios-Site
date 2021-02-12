<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use App\Models\Sindicato;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $sindicates = new Sindicato();
        return view('adm.home')->withSindicates($sindicates->all()->toArray());
    }
}
