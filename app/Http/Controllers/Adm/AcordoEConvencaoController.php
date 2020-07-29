<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entidade;
use App\Models\AcordoEConvencao;
use App\Services\Upload;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AcordoEConvencaoController extends Controller
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
        $acordoEConvencao = new AcordoEConvencao();

        $return['list'] = $acordoEConvencao->listAllToAdmPageAcordosEConvencoes()->get()->toJson();

        return view('adm.acordo-e-convencoes.acordo-e-convencoes')->withReturn($return);
    }

    public function cadastro(Request $request)
    {
        $entidades = new Entidade();
        return view('adm.acordo-e-convencoes.acordo-e-convencoes-cadastrar')->withEntidades($entidades->all()->toJson());
    }

    public function edicao(Request $request, $id = '')
    {
        if( (int) $id == 0 ) {
            return redirect('/adm/acordos-e-convencoes');
        }
        
        $acordoEConvencao = new AcordoEConvencao();
        $acordoEConvencao = $acordoEConvencao->findById($id);
        $entidades = new Entidade();
        
        return view('adm.acordo-e-convencoes.acordo-e-convencoes-editar')->withList(json_encode($acordoEConvencao))->withEntidades($entidades->all()->toJson());
    }

    public function cadastrar(Request $request)
    {
        $acordoEConvencao = new AcordoEConvencao();
        $acordoEConvencao->dataInclusao = $request->input('dataInclusao') ? Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;                    
        $acordoEConvencao->dataLimiteNoDestaque = $request->input('dataLimiteNoDestaque') ? Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimiteNoDestaque')} {$request->input('horaLimiteNoDestaque')}") : null;
        $acordoEConvencao->horaLimiteNoDestaque = $request->input('horaLimiteNoDestaque') ? Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque')) : null;
        $acordoEConvencao->ativo = $request->input('ativar') == 'true' ? 'S' : 'N';
        $acordoEConvencao->entidade = $request->input('idEntidade') ?? null;
        $acordoEConvencao->ativarNosSindicatos = $request->input('ativarNosSindicatos') ?? null;
        $acordoEConvencao->cartola = $request->input('cartola') ?? '';
        $acordoEConvencao->tags = $request->input('tags') ?? '';
        $acordoEConvencao->titulo = $request->input('titulo') ?? '';
        $acordoEConvencao->linhaDeApoio = $request->input('linhaDeApoio') ?? '';
        $acordoEConvencao->userIdCreated = Auth::id();
        
        $acordoEConvencao->save();
        
        $file = new Upload();
        $file->path = 'files/acordosEConvencoes';
        $file->creditfile = $request->input('creditoBannerDestaque') ?? null;
        $fileBannerDestaqueStored = $file->addFile( $request->file('bannerDestaque') );
        
        if ( count($fileBannerDestaqueStored) > 0 ) {
            $acordoEConvencao->bannerDestaque = $fileBannerDestaqueStored['FileId'];
            $acordoEConvencao->save();
        }
        
        $file = new Upload();
        $file->path = 'files/acordosEConvencoes';
        $fileStored = $file->addFile( $request->file('file') );

        if ( count($fileStored) > 0 ) {
            $acordoEConvencao->file = $fileStored['FileId'];
            $acordoEConvencao->save();
        }

        return redirect(url('adm/acordos-e-convencoes'));
    }

    public function editar(Request $request)
    {
        $acordoEConvencao = new AcordoEConvencao();
        $acordoEConvencao = $acordoEConvencao->find($request->input('id'));
        
        $acordoEConvencao->dataInclusao = $request->input('dataInclusao') ? Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;
        $acordoEConvencao->dataLimiteNoDestaque = $request->input('dataLimiteNoDestaque') ? Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimiteNoDestaque')} {$request->input('horaLimiteNoDestaque')}") : null;
        $acordoEConvencao->horaLimiteNoDestaque = $request->input('horaLimiteNoDestaque') ? Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque')) : null;
        $acordoEConvencao->ativo = $request->input('ativar') == 'true' ? 'S' : 'N';
        $acordoEConvencao->entidade = $request->input('idEntidade') ?? null;
        $acordoEConvencao->ativarNosSindicatos = $request->input('ativarNosSindicatos') ?? null;
        $acordoEConvencao->cartola = $request->input('cartola') ?? '';
        $acordoEConvencao->tags = $request->input('tags') ?? '';
        $acordoEConvencao->titulo = $request->input('titulo') ?? '';
        $acordoEConvencao->linhaDeApoio = $request->input('linhaDeApoio') ?? '';
        $acordoEConvencao->userIdUpdated = Auth::id();
        $acordoEConvencao->save();

        $creditoBannerDestaque = new File();
        $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $acordoEConvencao->bannerDestaque )->first();

        $creditoBannerDestaque = new File();
        if ( $request->file('bannerDestaque') )
        {
            $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $acordoEConvencao->bannerDestaque )->first();

            if ($creditoBannerDestaque) {
                $creditoBannerDestaque->delete();
            }

            $file = new Upload();
            $file->path = 'files/acordosEConvencoes';
            $file->creditfile = $request->input('creditoBannerDestaque') ?? null;
            $fileBannerDestaqueStored = $file->addFile( $request->file('bannerDestaque') );
            
            if ( count($fileBannerDestaqueStored) > 0 ) {
                $acordoEConvencao->bannerDestaque = $fileBannerDestaqueStored['FileId'];
                $acordoEConvencao->save();
            }
        }
        else
        {
            $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $acordoEConvencao->bannerDestaque )->first();

            if ($creditoBannerDestaque) {
                $creditoBannerDestaque->creditfile = $request->input('creditoBannerDestaque') ?? null;
                $creditoBannerDestaque->save();
            }   
        }


        if ( $request->file('file') )
        {
            $file = new File();
            $file = $file->where( 'id', $acordoEConvencao->file )->first();
            $file->delete();

            $file = new Upload();
            $file->path = 'files/acordosEConvencoes';
            $fileStored = $file->addFile( $request->file('file') );
            
            if ( count($fileStored) > 0 ) {
                $acordoEConvencao->file = $fileStored['FileId'];
                $acordoEConvencao->save();
            }
        }
    
        return redirect(url('adm/acordos-e-convencoes'));
    }

    public function deletar(Request $request)
    {
        $acordoEConvencao = new AcordoEConvencao();
        $delete = $acordoEConvencao->find($request->input('id'));
        $delete->delete();
        return redirect(url('adm/acordos-e-convencoes'));
    }
}
