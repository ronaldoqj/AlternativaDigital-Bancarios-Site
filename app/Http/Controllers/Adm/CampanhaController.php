<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campanha;
use App\_Helpers\Upload;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CampanhaController extends Controller
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
        $Campanha = new Campanha();

        $return['list'] = $Campanha->listAllToAdmPageCampanhas()->get()->toJson();

        return view('adm.campanhas.campanhas')->withReturn($return);
    }

    public function cadastro(Request $request)
    {
        return view('adm.campanhas.campanhas-cadastrar');
    }

    public function edicao(Request $request, $id = '')
    {
        if( (int) $id == 0 ) {
            return redirect('/adm/campanhas');
        }
        
        $Campanha = new Campanha();
        $Campanha = $Campanha->findById($id);
        
        return view('adm.campanhas.campanhas-editar')->withList(json_encode($Campanha));
    }

    public function cadastrar(Request $request)
    {
        $Campanha = new Campanha();

        $Campanha->dataInclusao = $request->input('dataInclusao') ?  Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao'))                                       : null;
        $Campanha->dataLimite   = $request->input('dataLimite')   ?  Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimite')} {$request->input('horaLimite')}") : null;
        $Campanha->horaLimite   = $request->input('horaLimite')   ?  Carbon::createFromFormat('H:i', $request->input('horaLimite'))                                           : null;

        $Campanha->name = $request->input('name') ?? '';
        $Campanha->link = $request->input('link') ?? '';
        $Campanha->userIdCreated = Auth::id();
        
        $Campanha->save();
        
        $file = new Upload();
        $file->path = 'files/campanhas';
        $fileStored = $file->addFile( $request->file('file') );

        if ( count($fileStored) > 0 ) {
            $Campanha->file = $fileStored['FileId'];
            $Campanha->save();
        }

        return redirect(url('adm/campanhas'));
    }

    public function editar(Request $request)
    {
        $Campanha = new Campanha();
        $Campanha = $Campanha->find($request->input('id'));
        
        $Campanha->dataInclusao = $request->input('dataInclusao') ?  Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao'))                                       : null;
        $Campanha->dataLimite   = $request->input('dataLimite')   ?  Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimite')} {$request->input('horaLimite')}") : null;
        $Campanha->horaLimite   = $request->input('horaLimite')   ?  Carbon::createFromFormat('H:i', $request->input('horaLimite'))                                           : null;

        $Campanha->name = $request->input('name') ?? '';
        $Campanha->link = $request->input('link') ?? '';
        $Campanha->userIdUpdated = Auth::id();

        $Campanha->save();


        if ( $request->file('file') )
        {
            $file = new File();
            $file = $file->where( 'id', $Campanha->file )->first();
            $file->delete();

            $file = new Upload();
            $file->path = 'files/campanhas';
            $fileStored = $file->addFile( $request->file('file') );
            
            if ( count($fileStored) > 0 ) {
                $Campanha->file = $fileStored['FileId'];
                $Campanha->save();
            }
        }
    
        return redirect(url('adm/campanhas'));
    }

    public function deletar(Request $request)
    {
        $Campanha = new Campanha();
        $delete = $Campanha->find($request->input('id'));
        $delete->delete();
        return redirect(url('adm/campanhas'));
    }
}
