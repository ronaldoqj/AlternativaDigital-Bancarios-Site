<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntidadeParceira;


class EntidadesParceirasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    
    public function index(Request $request)
    {
        $editais = new EntidadeParceira();
        $editais = $editais->listAllToSitePageEntidadesParceiras()->get();

        return view('entidades-parceiras')->withReturn($editais);
    }
    
}
