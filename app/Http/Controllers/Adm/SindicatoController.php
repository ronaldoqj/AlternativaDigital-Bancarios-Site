<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sindicato;
use App\Services\Upload;
use App\Models\File;
use App\Models\Estado;
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

        $return['list'] = $Sindicato->listAllToAdmPageSindicatos()->get()->toArray();

        return view('adm.sindicatos.sindicatos')->withReturn($return);
    }

    public function cadastro(Request $request)
    {
        $estados = new Estado();
        return view('adm.sindicatos.sindicato-cadastrar')->withEstados(json_encode($estados->all()->toArray()));
    }

    public function edicao(Request $request, $id = '')
    {
        if( (int) $id == 0 ) {
            return redirect()->route('adm-sindicatos');
        }
        
        $sindicato = new Sindicato();
        $sindicato = $sindicato->findById($id);

        $estados = new Estado();
        
        return view('adm.sindicatos.sindicato-editar')->withList(json_encode($sindicato))->withEstados(json_encode($estados->all()->toArray()));
    }
    
    /**
     * Método responsavel pela edição do simdicato escolhido
     * Quando entra na edição do sindicato de Porto Alegre por exemplo,
     * o sindicado de Porto Alegre apenas pode editar as informações
     */
    public function edicaoSindicatoVigente(Request $request)
    {
        $sindicato = new Sindicato();
        $sindicato = $sindicato->findById(session()->get('configAdm')['entity']);

        if (! $sindicato) {
            return redirect()->route('adm-home');
        }
        
        $estados = new Estado();
                
        return view('adm.sindicatos.sindicato-editar')->withList(json_encode($sindicato))
                                                      ->withEstados(json_encode($estados->all()->toArray()))
                                                      ->withSindicatoAtual(true);
    }

    public function cadastrar(Request $request)
    {
        $Sindicato = new Sindicato();

        $Sindicato->ativo = $request->input('ativo') == "true" ? 'S' : 'N';
        $Sindicato->subdomain = $request->input('subdominio') ?? null;
        $Sindicato->name = $request->input('name') ?? null;
        $Sindicato->fone = $request->input('fone') ?? null;
        $Sindicato->fone2 = $request->input('fone2') ?? null;
        $Sindicato->email = $request->input('email') ?? null;
        $Sindicato->facebook = $request->input('facebook') ?? null;
        $Sindicato->twitter = $request->input('twitter') ?? null;
        $Sindicato->instagram = $request->input('instagram') ?? null;
        $Sindicato->whatsapp = $request->input('whatsapp') ?? null;
        $Sindicato->podcast = $request->input('podcast') ?? null;
        $Sindicato->youtube = $request->input('youtube') ?? null;
        $Sindicato->cep = $request->input('cep') ?? null;
        $Sindicato->endereco = $request->input('endereco') ?? null;
        $Sindicato->numero = $request->input('numero') ?? null;
        $Sindicato->complemento = $request->input('complemento') ?? null;
        $Sindicato->bairro = $request->input('bairro') ?? null;
        $Sindicato->cidade = $request->input('cidade') ?? null;
        $Sindicato->uf = $request->input('estado') ?? null;
        // $Sindicato->deleted_at = $request->input('deleted_at') ?  Carbon::createFromFormat('Y-m-d', $request->input('deleted_at'))                                       : null;
        // $Sindicato->created_at   = $request->input('created_at')   ?  Carbon::createFromFormat('Y-m-d H:i', "{$request->input('created_at')} {$request->input('horaLimite')}") : null;
        // $Sindicato->updated_at   = $request->input('updated_at')   ?  Carbon::createFromFormat('H:i', $request->input('updated_at'))                                           : null;
        $Sindicato->userIdUpdated = Auth::id();

        $Sindicato->save();
        
        // Banner
        $file = new Upload();
        $file->path = 'files/sindicatos';
        $file->creditfile = $request->input('creditoBanner') ?? null;
        $fileBannerStored = $file->addFile( $request->file('banner') );
        
        if ( count($fileBannerStored) > 0 ) {
            $Sindicato->banner = $fileBannerStored['FileId'];
            $Sindicato->save();
        }
        // Logo
        $file = new Upload();
        $file->path = 'files/sindicatos';
        $file->creditfile = $request->input('creditoLogo') ?? null;
        $fileLogoStored = $file->addFile( $request->file('logo') );
        
        if ( count($fileLogoStored) > 0 ) {
            $Sindicato->logo = $fileLogoStored['FileId'];
            $Sindicato->save();
        }


        return redirect(url('adm/sindicatos'));
    }

    public function editar(Request $request)
    {
        $id = $request->input('id');
        $Sindicato = new Sindicato();
        $Sindicato = $Sindicato->find($id);
        $Sindicato->ativo = $request->input('ativo') == "true" ? 'S' : 'N';
        if ($request->input('subdominio')){
            $Sindicato->subdomain = $request->input('subdominio');
        }
        $Sindicato->name = $request->input('name') ?? null;
        $Sindicato->fone = $request->input('fone') ?? null;
        $Sindicato->fone2 = $request->input('fone2') ?? null;
        $Sindicato->email = $request->input('email') ?? null;
        $Sindicato->facebook = $request->input('facebook') ?? null;
        $Sindicato->twitter = $request->input('twitter') ?? null;
        $Sindicato->instagram = $request->input('instagram') ?? null;
        $Sindicato->whatsapp = $request->input('whatsapp') ?? null;
        $Sindicato->podcast = $request->input('podcast') ?? null;
        $Sindicato->youtube = $request->input('youtube') ?? null;
        $Sindicato->cep = $request->input('cep') ?? null;
        $Sindicato->endereco = $request->input('endereco') ?? null;
        $Sindicato->numero = $request->input('numero') ?? null;
        $Sindicato->complemento = $request->input('complemento') ?? null;
        $Sindicato->bairro = $request->input('bairro') ?? null;
        $Sindicato->cidade = $request->input('cidade') ?? null;
        $Sindicato->uf = $request->input('estado') ?? null;
        $Sindicato->userIdUpdated = Auth::id();

        $Sindicato->save();

        /**
         * Update Banner
         */
        $banner = new File();
        if ( $request->file('banner') )
        {
            $banner = $banner->where( 'id', $Sindicato->banner )->first();

            if ($banner) {
                $banner->delete();
            }

            $file = new Upload();
            $file->path = 'files/sindicatos';
            $file->creditfile = $request->input('creditoBanner') ?? null;
            $fileBannerStored = $file->addFile( $request->file('banner') );
            
            if ( count($fileBannerStored) > 0 ) {
                $Sindicato->banner = $fileBannerStored['FileId'];
                $Sindicato->save();
            }
        }

        /**
         * Update Logo
         */
        $logo = new File();
        if ( $request->file('logo') )
        {
            $logo = $logo->where( 'id', $Sindicato->logo )->first();

            if ($logo) {
                $logo->delete();
            }

            $file = new Upload();
            $file->path = 'files/sindicatos';
            $file->creditfile = $request->input('creditoLogo') ?? null;
            $fileLogoStored = $file->addFile( $request->file('logo') );
            
            if ( count($fileLogoStored) > 0 ) {
                $Sindicato->logo = $fileLogoStored['FileId'];
                $Sindicato->save();
            }
        }
        
        if ($request->input('sindicatoAtual')) {
            return redirect()->route('adm-dashboard');
        }
        
        return redirect()->route('adm-sindicatos');
    }

    public function deletar(Request $request)
    {
        $Sindicato = new Sindicato();
        $delete = $Sindicato->find($request->input('id'));
        $delete->delete();
        return redirect(url('adm/sindicatos'));
    }
}
