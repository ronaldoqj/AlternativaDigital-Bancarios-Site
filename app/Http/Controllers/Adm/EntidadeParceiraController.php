<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EntidadeParceira;
use App\_Helpers\Upload;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class EntidadeParceiraController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckPermission:adm_entidadesParceiras');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $return = [];
        $EntidadeParceira = new EntidadeParceira();

        $return['list'] = $EntidadeParceira->listAllToAdmPageEntidadesParceiras()->get()->toJson();

        return view('adm.entidades-parceiras.entidades-parceiras')->withReturn($return);
    }

    public function cadastro(Request $request)
    {
        return view('adm.entidades-parceiras.entidades-parceiras-cadastrar');
    }

    public function edicao(Request $request, $id = '')
    {
        if( (int) $id == 0 ) {
            return redirect('/adm/entidades-parceiras');
        }
        
        $EntidadeParceira = new EntidadeParceira();
        $EntidadeParceira = $EntidadeParceira->findById($id);
        
        return view('adm.entidades-parceiras.entidades-parceiras-editar')->withList(json_encode($EntidadeParceira));
    }

    public function cadastrar(Request $request)
    {
        $EntidadeParceira = new EntidadeParceira();
        $EntidadeParceira->name = $request->input('name') ?? '';
        $EntidadeParceira->link = $request->input('link') ?? '';
        $EntidadeParceira->userIdCreated = Auth::id();
        
        $EntidadeParceira->save();
        
        $file = new Upload();
        $file->path = 'files/entidades-parceiras';
        $fileStored = $file->addFile( $request->file('file') );

        if ( count($fileStored) > 0 ) {
            $EntidadeParceira->file = $fileStored['FileId'];
            $EntidadeParceira->save();
        }

        return redirect(url('adm/entidades-parceiras'));
    }

    public function editar(Request $request)
    {
        $EntidadeParceira = new EntidadeParceira();
        $EntidadeParceira = $EntidadeParceira->find($request->input('id'));
        
        $EntidadeParceira->name = $request->input('name') ?? '';
        $EntidadeParceira->link = $request->input('link') ?? '';
        $EntidadeParceira->userIdUpdated = Auth::id();
        $EntidadeParceira->save();


        if ( $request->file('file') )
        {
            $file = new File();
            $file = $file->where( 'id', $EntidadeParceira->file )->first();
            $file->delete();

            $file = new Upload();
            $file->path = 'files/entidades-parceiras';
            $fileStored = $file->addFile( $request->file('file') );
            
            if ( count($fileStored) > 0 ) {
                $EntidadeParceira->file = $fileStored['FileId'];
                $EntidadeParceira->save();
            }
        }
    
        return redirect(url('adm/entidades-parceiras'));
    }

    public function deletar(Request $request)
    {
        $EntidadeParceira = new EntidadeParceira();
        $delete = $EntidadeParceira->find($request->input('id'));
        $delete->delete();
        return redirect(url('adm/entidades-parceiras'));
    }
}
