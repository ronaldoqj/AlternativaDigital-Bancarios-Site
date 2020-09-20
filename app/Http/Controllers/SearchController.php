<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class SearchController extends Controller
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
        $return = [
            'fieldSearch' => $request->input('search'),
            'noticias' => []
        ];

        if ($request->input('search'))
        {
            $noticias = new Noticia();
            $noticias = $noticias->searchPageSearch($request->input('search'));

            if ($noticias) {
                $return['noticias'] = $noticias;
            }
        }

        return view('search')->withReturn($return);
    }
}
