<?php

namespace App\Http\Controllers\Sindicatos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EditaisController extends Controller
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
        

        return view('sindicatos.editais');
    }
}
