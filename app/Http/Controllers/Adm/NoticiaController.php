<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banco;
use App\Models\Noticia;
use App\Services\Upload;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Error\Notice;

class NoticiaController extends Controller
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
        $noticia = new Noticia();

        $return['noticiaDestaque'] = $noticia->listAllToAdmPageNoticias('noticia-destaque')->get()->toJson();
        $return['noticiaComImagem'] = $noticia->listAllToAdmPageNoticias('noticia-imagem')->get()->toJson();
        $return['noticiaComPodcast'] = $noticia->listAllToAdmPageNoticias('noticia-podcast')->get()->toJson();
        $return['noticiaComVideo'] = $noticia->listAllToAdmPageNoticias('noticia-video')->get()->toJson();
        $return['noticiaSimples'] = $noticia->listAllToAdmPageNoticias('noticia-simples')->get()->toJson();

        return view('adm.noticias')->withReturn($return);
    }

    public function cadastro(Request $request)
    {
        $bancos = new Banco();
        return view('adm.noticias-cadastrar')->withBancos($bancos->all()->toJson());
    }

    public function edicao(Request $request, $id = '')
    {
        if( (int) $id == 0 ) {
            return redirect('/adm/noticias');
        }
        
        $noticia = new Noticia();
        $noticia = $noticia->findById($id);

        $bancos = new Banco();

        return view('adm.noticias-editar')->withNoticia(json_encode($noticia))->withBancos($bancos->all()->toJson());
    }

    public function cadastrarNoticia(Request $request)
    {
        $noticia = new Noticia();
        $noticia->tipoDaNoticia = $request->input('tipoDaNoticia') ?? '';
        $noticia->dataInclusao = $request->input('dataInclusao') ? Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;
        $noticia->dataLimiteNoDestaque = $request->input('dataLimiteNoDestaque') ? Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimiteNoDestaque')} {$request->input('horaLimiteNoDestaque')}") : null;
        $noticia->horaLimiteNoDestaque = $request->input('horaLimiteNoDestaque') ? Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque')) : null;
        $noticia->ativo = $request->input('ativarNoticia') == 'true' ? 'S' : 'N';
        $noticia->meuBanco = $request->input('idBanco') ?? null;
        $noticia->ativarNosSindicatos = $request->input('ativarNosSindicatos') ?? null;
        $noticia->videoYoutube = $request->input('videoYoutube') ?? '';
        $noticia->cartola = $request->input('cartola') ?? '';
        $noticia->tags = $request->input('tags') ?? '';
        $noticia->titulo = $request->input('tituloDaNoticia') ?? '';
        $noticia->linhaDeApoio = $request->input('linhaDeApoio') ?? '';
        $noticia->texto = $request->input('texto') ?? '';
        $noticia->jornalistaResponsavel = $request->input('jornalistaResponsavel') ?? '';
        $noticia->userIdCreated = Auth::id();
        
        $noticia->save();
        
        
        $file = new Upload();
        $file->path = 'files/noticias';
        $file->creditfile = $request->input('creditoBannerDestaque') ?? null;
        $fileBannerDestaqueStored = $file->addFile( $request->file('bannerDestaque') );
        
        if ( count($fileBannerDestaqueStored) > 0 ) {
            $noticia->bannerDestaque = $fileBannerDestaqueStored['FileId'];
            $noticia->save();
        }

        $file = new Upload();
        $file->path = 'files/noticias';
        $file->creditfile = $request->input('creditoImagemDestaque') ?? null;
        $fileIdImagemDestaqueStored = $file->addFile( $request->file('imagemDestaque') );
        
        if ( count($fileIdImagemDestaqueStored) > 0 ) {
            $noticia->imagemDestaque = $fileIdImagemDestaqueStored['FileId'];
            $noticia->save();
        }
        
        $file = new Upload();
        $file->path = 'files/noticias';
        $filePodcastStored = $file->addFile( $request->file('filePodcast') );

        if ( count($filePodcastStored) > 0 ) {
            $noticia->filePodcast = $filePodcastStored['FileId'];
            $noticia->save();
        }

        return redirect(url('adm/noticias'));
    }

    public function editarNoticia(Request $request)
    {
        $noticia = new Noticia();
        $noticia = $noticia->find($request->input('idNoticia'));
        
        $noticia->tipoDaNoticia = $request->input('tipoDaNoticia') ?? '';
        $noticia->dataInclusao = $request->input('dataInclusao') ? Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;
        $noticia->dataLimiteNoDestaque = $request->input('dataLimiteNoDestaque') ? Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimiteNoDestaque')} {$request->input('horaLimiteNoDestaque')}") : null;
        $noticia->horaLimiteNoDestaque = $request->input('horaLimiteNoDestaque') ? Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque')) : null;
        $noticia->ativo = $request->input('ativarNoticia') == 'true' ? 'S' : 'N';
        $noticia->meuBanco = $request->input('idBanco') ?? null;
        $noticia->ativarNosSindicatos = $request->input('ativarNosSindicatos') ?? null;
        $noticia->videoYoutube = $request->input('videoYoutube') ?? '';
        $noticia->cartola = $request->input('cartola') ?? '';
        $noticia->tags = $request->input('tags') ?? '';
        $noticia->titulo = $request->input('tituloDaNoticia') ?? '';
        $noticia->linhaDeApoio = $request->input('linhaDeApoio') ?? '';
        $noticia->texto = $request->input('texto') ?? '';
        $noticia->jornalistaResponsavel = $request->input('jornalistaResponsavel') ?? '';
        $noticia->userIdUpdated = Auth::id();
        $noticia->save();

        $creditoBannerDestaque = new File();
        $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $noticia->bannerDestaque )->first();

        $creditoBannerDestaque = new File();
        if ( $request->file('bannerDestaque') )
        {
            $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $noticia->bannerDestaque )->first();

            if ($creditoBannerDestaque) {
                $creditoBannerDestaque->delete();
            }

            $file = new Upload();
            $file->path = 'files/noticias';
            $file->creditfile = $request->input('creditoBannerDestaque') ?? null;
            $fileBannerDestaqueStored = $file->addFile( $request->file('bannerDestaque') );
            
            if ( count($fileBannerDestaqueStored) > 0 ) {
                $noticia->bannerDestaque = $fileBannerDestaqueStored['FileId'];
                $noticia->save();
            }
        }
        else
        {
            $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $noticia->bannerDestaque )->first();

            if ($creditoBannerDestaque) {
                $creditoBannerDestaque->creditfile = $request->input('creditoBannerDestaque') ?? null;
                $creditoBannerDestaque->save();
            }   
        }

        
        $creditoImagemDestaque = new File();
        if ( $request->file('imagemDestaque') )
        {
            $creditoImagemDestaque = $creditoImagemDestaque->where( 'id', $noticia->imagemDestaque )->first();
            if ($creditoImagemDestaque) {
                $creditoImagemDestaque->delete();
            }

            $file = new Upload();
            $file->path = 'files/noticias';
            $file->creditfile = $request->input('creditoImagemDestaque') ?? null;
            $fileIdImagemDestaqueStored = $file->addFile( $request->file('imagemDestaque') );
            
            if ( count($fileIdImagemDestaqueStored) > 0 ) {
                $noticia->imagemDestaque = $fileIdImagemDestaqueStored['FileId'];
                $noticia->save();
            }
        }
        else
        {
            $creditoImagemDestaque = $creditoImagemDestaque->where( 'id', $noticia->imagemDestaque )->first();

            if ($creditoImagemDestaque) {
                $creditoImagemDestaque->creditfile = $request->input('creditoImagemDestaque') ?? null;
                $creditoImagemDestaque->save();
            }   
        }

        if ( $request->file('filePodcast') )
        {
            $filePodcast = new File();
            $filePodcast = $filePodcast->where( 'id', $noticia->filePodcast )->first();
            $filePodcast->delete();

            $file = new Upload();
            $file->path = 'files/noticias';
            $filePodcastStored = $file->addFile( $request->file('filePodcast') );
            
            if ( count($filePodcastStored) > 0 ) {
                $noticia->filePodcast = $filePodcastStored['FileId'];
                $noticia->save();
            }
        }
    
        return redirect(url('adm/noticias'));
    }

    public function deletarNoticia(Request $request)
    {
        $noticia = new Noticia();
        $delete = $noticia->find($request->input('id'));
        $delete->delete();
        return redirect(url('adm/noticias'));
    }
}
