<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Edital;
use App\_Helpers\Upload;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class UsuarioController extends Controller
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
        $return = ['teste' => 'teste'];
        //$Edital = new Edital();

        //$return['list'] = $Edital->listAllToAdmPageEditais()->get()->toJson();

        return view('adm.usuarios.usuarios')->withReturn($return);
    }

    public function cadastro(Request $request)
    {
        return view('adm.usuarios.usuarios-cadastrar');
    }

    public function edicao(Request $request, $id = '')
    {
        if ( (int) $id == 0 ) {
            return redirect('/adm/usuarios');
        }
        
        $Edital = new Edital();
        $Edital = $Edital->findById($id);
        
        return view('adm.usuarios.usuarios-editar')->withList(json_encode($Edital));
    }

    public function cadastrar(Request $request)
    {
        $Edital = new Edital();
        $Edital->dataInclusao = $request->input('dataInclusao') ? Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;
        $Edital->dataLimiteNoDestaque = $request->input('dataLimiteNoDestaque') ? Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimiteNoDestaque')} {$request->input('horaLimiteNoDestaque')}") : null;
        $Edital->horaLimiteNoDestaque = $request->input('horaLimiteNoDestaque') ? Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque')) : null;
        $Edital->ativo = $request->input('ativar') == 'true' ? 'S' : 'N';
        $Edital->ativarNosSindicatos = $request->input('ativarNosSindicatos') ?? null;
        $Edital->cartola = $request->input('cartola') ?? '';
        $Edital->tags = $request->input('tags') ?? '';
        $Edital->titulo = $request->input('titulo') ?? '';
        $Edital->linhaDeApoio = $request->input('linhaDeApoio') ?? '';
        $Edital->userIdCreated = Auth::id();
        
        $Edital->save();
        
        $file = new Upload();
        $file->path = 'files/usuarios';
        $file->creditfile = $request->input('creditoBannerDestaque') ?? null;
        $fileBannerDestaqueStored = $file->addFile( $request->file('bannerDestaque') );
        
        if ( count($fileBannerDestaqueStored) > 0 ) {
            $Edital->bannerDestaque = $fileBannerDestaqueStored['FileId'];
            $Edital->save();
        }
        
        $file = new Upload();
        $file->path = 'files/usuarios';
        $fileStored = $file->addFile( $request->file('file') );

        if ( count($fileStored) > 0 ) {
            $Edital->file = $fileStored['FileId'];
            $Edital->save();
        }

        return redirect(url('adm/usuarios'));
    }

    public function editar(Request $request)
    {
        $Edital = new Edital();
        $Edital = $Edital->find($request->input('id'));
        
        $Edital->dataInclusao = $request->input('dataInclusao') ? Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;
        $Edital->dataLimiteNoDestaque = $request->input('dataLimiteNoDestaque') ? Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimiteNoDestaque')} {$request->input('horaLimiteNoDestaque')}") : null;
        $Edital->horaLimiteNoDestaque = $request->input('horaLimiteNoDestaque') ? Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque')) : null;
        $Edital->ativo = $request->input('ativar') == 'true' ? 'S' : 'N';
        $Edital->ativarNosSindicatos = $request->input('ativarNosSindicatos') ?? null;
        $Edital->cartola = $request->input('cartola') ?? '';
        $Edital->tags = $request->input('tags') ?? '';
        $Edital->titulo = $request->input('titulo') ?? '';
        $Edital->linhaDeApoio = $request->input('linhaDeApoio') ?? '';
        $Edital->userIdUpdated = Auth::id();
        $Edital->save();

        $creditoBannerDestaque = new File();
        $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $Edital->bannerDestaque )->first();

        $creditoBannerDestaque = new File();
        if ( $request->file('bannerDestaque') )
        {
            $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $Edital->bannerDestaque )->first();

            if ($creditoBannerDestaque) {
                $creditoBannerDestaque->delete();
            }

            $file = new Upload();
            $file->path = 'files/usuarios';
            $file->creditfile = $request->input('creditoBannerDestaque') ?? null;
            $fileBannerDestaqueStored = $file->addFile( $request->file('bannerDestaque') );
            
            if ( count($fileBannerDestaqueStored) > 0 ) {
                $Edital->bannerDestaque = $fileBannerDestaqueStored['FileId'];
                $Edital->save();
            }
        }
        else
        {
            $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $Edital->bannerDestaque )->first();

            if ($creditoBannerDestaque) {
                $creditoBannerDestaque->creditfile = $request->input('creditoBannerDestaque') ?? null;
                $creditoBannerDestaque->save();
            }   
        }


        if ( $request->file('file') )
        {
            $file = new File();
            $file = $file->where( 'id', $Edital->file )->first();
            $file->delete();

            $file = new Upload();
            $file->path = 'files/usuarios';
            $fileStored = $file->addFile( $request->file('file') );
            
            if ( count($fileStored) > 0 ) {
                $Edital->file = $fileStored['FileId'];
                $Edital->save();
            }
        }
    
        return redirect(url('adm/usuarios'));
    }

    public function deletar(Request $request)
    {
        $Edital = new Edital();
        $delete = $Edital->find($request->input('id'));
        $delete->delete();
        return redirect(url('adm/usuarios'));
    }
}
