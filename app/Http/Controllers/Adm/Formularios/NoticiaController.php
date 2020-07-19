<?php

namespace App\Http\Controllers\Adm\Formularios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Services\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

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
        return redirect(url('adm'));
    }

    public function cadastrarNoticia($request)
    {
        $noticia = new Noticia();
dd('Noticia do formulário que é para deixar de existir');
        $noticia->tipoDaNoticia = $request->input('tipoDaNoticia') ?? '';
        $noticia->dataInclusao = $request->input('dataInclusao') ? Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;
        $noticia->dataLimiteNoDestaque = $request->input('dataLimiteNoDestaque') ? Carbon::createFromFormat('Y-m-d', $request->input('dataLimiteNoDestaque')) : null;
        $noticia->horaLimiteNoDestaque = $request->input('horaLimiteNoDestaque') ?? '';
        $noticia->horaLimiteNoDestaque = Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque'));
        $noticia->ativo = $request->input('ativarNoticia') == 'true' ? 'S' : 'N';
        $noticia->ativarNosSindicatos = $request->input('ativarNosSindicatos') ?? '';
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
}
