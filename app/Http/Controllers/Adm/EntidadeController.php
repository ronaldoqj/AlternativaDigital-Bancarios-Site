<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Entidade;


class EntidadeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckPermission:adm_entidades');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $return = [];
        $entidade = new Entidade();
        $entidade = $entidade->all();

        return view('adm.entidades')->withReturn($entidade);
    }

    public function actions(Request $request)
    {
        $entidade = new Entidade();

        switch ($request->input('action')) {
            case "cadastrar":
                $entidade->name = $request->input('name');
                $entidade->save();
                break;
            case "editar":
                $edit = $entidade->find($request->input('id'));
                $edit->name = $request->input('name');
                $edit->save();
                break;
            case "excluir":
                $delete = $entidade->find($request->input('id'));
                $delete->delete();
                break;
        }        

        return redirect()->route('adm-entidades');
    }
    
}
