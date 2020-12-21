<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sindicato;
use App\Services\Upload;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class SindicatoController extends Controller
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
        $Sindicato = new Sindicato();

        $return['list'] = $Sindicato->listAllToAdmPageSindicatos()->get()->toJson();

        return view('adm.sindicatos.sindicatos')->withReturn($return);
    }

    public function cadastro(Request $request)
    {
        return view('adm.sindicatos.sindicato-cadastrar');
    }

    public function edicao(Request $request, $id = '')
    {
        if( (int) $id == 0 ) {
            return redirect('/adm/sindicatos');
        }
        
        $Sindicato = new Sindicato();
        $Sindicato = $Sindicato->findById($id);
        
        return view('adm.sindicatos.sindicato-editar')->withList(json_encode($Sindicato));
    }

    public function cadastrar(Request $request)
    {
        $Sindicato = new Sindicato();

        $Sindicato->dataInclusao = $request->input('dataInclusao') ?  Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao'))                                       : null;
        $Sindicato->dataLimite   = $request->input('dataLimite')   ?  Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimite')} {$request->input('horaLimite')}") : null;
        $Sindicato->horaLimite   = $request->input('horaLimite')   ?  Carbon::createFromFormat('H:i', $request->input('horaLimite'))                                           : null;

        $Sindicato->name = $request->input('name') ?? '';
        $Sindicato->link = $request->input('link') ?? '';
        $Sindicato->userIdCreated = Auth::id();
        
        $Sindicato->save();
        
        $file = new Upload();
        $file->path = 'files/sindicatos';
        $fileStored = $file->addFile( $request->file('file') );

        if ( count($fileStored) > 0 ) {
            $Sindicato->file = $fileStored['FileId'];
            $Sindicato->save();
        }

        return redirect(url('adm/sindicatos'));
    }

    public function editar(Request $request)
    {
        $Sindicato = new Sindicato();
        $Sindicato = $Sindicato->find($request->input('id'));
        
        $Sindicato->dataInclusao = $request->input('dataInclusao') ?  Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao'))                                       : null;
        $Sindicato->dataLimite   = $request->input('dataLimite')   ?  Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimite')} {$request->input('horaLimite')}") : null;
        $Sindicato->horaLimite   = $request->input('horaLimite')   ?  Carbon::createFromFormat('H:i', $request->input('horaLimite'))                                           : null;

        $Sindicato->name = $request->input('name') ?? '';
        $Sindicato->link = $request->input('link') ?? '';
        $Sindicato->userIdUpdated = Auth::id();

        $Sindicato->save();


        if ( $request->file('file') )
        {
            $file = new File();
            $file = $file->where( 'id', $Sindicato->file )->first();
            $file->delete();

            $file = new Upload();
            $file->path = 'files/sindicatos';
            $fileStored = $file->addFile( $request->file('file') );
            
            if ( count($fileStored) > 0 ) {
                $Sindicato->file = $fileStored['FileId'];
                $Sindicato->save();
            }
        }
    
        return redirect(url('adm/sindicatos'));
    }

    public function deletar(Request $request)
    {
        $Sindicato = new Sindicato();
        $delete = $Sindicato->find($request->input('id'));
        $delete->delete();
        return redirect(url('adm/sindicatos'));
    }
}
