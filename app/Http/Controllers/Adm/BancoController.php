<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banco;


class BancoController extends Controller
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
        $return = [];
        $banco = new Banco();
        $banco = $banco->all();

        return view('adm.bancos')->withReturn($banco);
    }

    public function actions(Request $request)
    {
        $banco = new Banco();

        switch ($request->input('action')) {
            case "cadastrar":
                $banco->name = $request->input('name');
                $banco->save();
                break;
            case "editar":
                $edit = $banco->find($request->input('id'));
                $edit->name = $request->input('name');
                $edit->save();
                break;
            case "excluir":
                $delete = $banco->find($request->input('id'));
                $delete->delete();
                break;
        }        

        return redirect()->route('adm-bancos');
    }
    
}
