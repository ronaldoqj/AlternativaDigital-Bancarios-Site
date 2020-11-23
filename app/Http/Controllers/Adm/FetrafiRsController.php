<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banco;
use App\Models\FetrafiRs;
use App\Services\Upload;
use App\Models\File;
use App\Models\Sindicato;
use App\Models\NoticiaHasSindicato;
use App\Models\NoticiaHasBanco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class FetrafiRsController extends Controller
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
        $fetrafiRs = new FetrafiRs();

        $return['noticiaDestaque'] = $fetrafiRs->listAllToAdmPageNoticias('noticia-destaque')->get()->toJson();
        $return['noticiaComImagem'] = $fetrafiRs->listAllToAdmPageNoticias('noticia-imagem')->get()->toJson();
        $return['noticiaComPodcast'] = $fetrafiRs->listAllToAdmPageNoticias('noticia-podcast')->get()->toJson();
        $return['noticiaComVideo'] = $fetrafiRs->listAllToAdmPageNoticias('noticia-video')->get()->toJson();
        $return['noticiaSimples'] = $fetrafiRs->listAllToAdmPageNoticias('noticia-simples')->get()->toJson();

        // Fazer a chamada para receber todos
        $return['noticiaSimples'] = $fetrafiRs->listAllToAdmPageNoticias('noticia-simples')->get()->toJson();

        return view('adm.fetrafi-rs')->withReturn($return);
    }

    public function cadastro(Request $request)
    {
        $bancos = new Banco();
        $sindicatos = new Sindicato();

        return view('adm.fetrafi-rs-cadastrar')->withBancos($bancos->all()->toJson())->withSindicatos($sindicatos->all()->toJson())->withBancos($bancos->all()->toJson());
    }

    public function edicao(Request $request, $id = '')
    {
        if ( (int) $id == 0 ) {
            return redirect('/adm/noticias');
        }
        
        $fetrafiRss = new FetrafiRs();
        $fetrafiRs = $fetrafiRss->findById($id);

        if ( !$fetrafiRs ) {
            return redirect('/adm/noticias');
        }

        $sindicatos = new Sindicato();

        $fetrafiRssSindicato = new FetrafiRs();
        $sindicatosDaNoticia = $fetrafiRssSindicato->findSindicatosByIdNoticia($id);


        $bancos = new Banco();

        $fetrafiRssBancos = new FetrafiRs();
        $bancosDaNoticia = $fetrafiRssBancos->findBancosByIdNoticia($id);

        return view('adm.fetrafi-rs-editar')->withNoticia(json_encode($fetrafiRs))->withRegisteredBanks(json_encode($bancosDaNoticia->get()))->withBancos($bancos->all()->toJson())->withRegisteredSyndicates(json_encode($sindicatosDaNoticia->get()))->withSindicatos($sindicatos->all()->toJson());
    }

    public function cadastrarNoticia(Request $request)
    {
        $fetrafiRs = new FetrafiRs();
        $fetrafiRs->tipoDaNoticia         = $request->input('tipoDaNoticia')           ?? '';
        $fetrafiRs->dataInclusao          = $request->input('dataInclusao')            ?  Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;
        $fetrafiRs->dataLimiteNoDestaque  = $request->input('dataLimiteNoDestaque')    ?  Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimiteNoDestaque')} {$request->input('horaLimiteNoDestaque')}") : null;
        $fetrafiRs->horaLimiteNoDestaque  = $request->input('horaLimiteNoDestaque')    ?  Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque')) : null;
        $fetrafiRs->ativo                 = $request->input('ativarNoticia') == 'true' ?  'S' : 'N';
        $fetrafiRs->ativarNosSindicatos   = $request->input('ativarNosSindicatos')     ?? null;
        $fetrafiRs->videoYoutube          = $request->input('videoYoutube')            ?? '';
        $fetrafiRs->cartola               = $request->input('cartola')                 ?? '';
        $fetrafiRs->tags                  = $request->input('tags')                    ?? '';
        $fetrafiRs->titulo                = $request->input('tituloDaNoticia')         ?? '';
        $fetrafiRs->linhaDeApoio          = $request->input('linhaDeApoio')            ?? '';
        $fetrafiRs->texto                 = $request->input('texto')                   ?? '';
        $fetrafiRs->jornalistaResponsavel = $request->input('jornalistaResponsavel')   ?? '';
        $fetrafiRs->userIdCreated         = Auth::id();
        $fetrafiRs->save();        


        $bancos = $request->input('idsBancos');
    
        if ($bancos)
        {            
            $bancos = explode(',', $bancos);

            foreach ( $bancos as $item )
            {
                $noticaHasBanco = new NoticiaHasBanco();
                $noticaHasBanco->noticia = $fetrafiRs->id;
                $noticaHasBanco->banco = $item;

                $noticaHasBanco->save();
            }
        }


        $sindicatos = $request->input('idsSindicatos');
    
        if ($sindicatos)
        {            
            $sindicatos = explode(',', $sindicatos);

            foreach ( $sindicatos as $item )
            {
                $noticaHasSindicato = new NoticiaHasSindicato();
                $noticaHasSindicato->noticia = $fetrafiRs->id;
                $noticaHasSindicato->Sindicato = $item;

                $noticaHasSindicato->save();
            }
        }
        
        

        $file = new Upload();
        $file->path = 'files/noticias';
        $file->creditfile = $request->input('creditoBannerDestaque') ?? null;
        $fileBannerDestaqueStored = $file->addFile( $request->file('bannerDestaque') );
        
        if ( count($fileBannerDestaqueStored) > 0 ) {
            $fetrafiRs->bannerDestaque = $fileBannerDestaqueStored['FileId'];
            $fetrafiRs->save();
        }

        $file = new Upload();
        $file->path = 'files/noticias';
        $file->creditfile = $request->input('creditoImagemDestaque') ?? null;
        $fileIdImagemDestaqueStored = $file->addFile( $request->file('imagemDestaque') );
        
        if ( count($fileIdImagemDestaqueStored) > 0 ) {
            $fetrafiRs->imagemDestaque = $fileIdImagemDestaqueStored['FileId'];
            $fetrafiRs->save();
        }
        
        $file = new Upload();
        $file->path = 'files/noticias';
        $filePodcastStored = $file->addFile( $request->file('filePodcast') );

        if ( count($filePodcastStored) > 0 ) {
            $fetrafiRs->filePodcast = $filePodcastStored['FileId'];
            $fetrafiRs->save();
        }

        return redirect(url('adm/noticias'));
    }


    public function editarNoticia(Request $request)
    {
        $fetrafiRs = new FetrafiRs();
        $fetrafiRs = $fetrafiRs->find($request->input('idNoticia'));
        
        $fetrafiRs->tipoDaNoticia         = $request->input('tipoDaNoticia')           ?? '';
        $fetrafiRs->dataInclusao          = $request->input('dataInclusao')            ?  Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;
        $fetrafiRs->dataLimiteNoDestaque  = $request->input('dataLimiteNoDestaque')    ?  Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimiteNoDestaque')} {$request->input('horaLimiteNoDestaque')}") : null;
        $fetrafiRs->horaLimiteNoDestaque  = $request->input('horaLimiteNoDestaque')    ?  Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque')) : null;
        $fetrafiRs->ativo                 = $request->input('ativarNoticia') == 'true' ?  'S' : 'N';
        $fetrafiRs->ativarNosSindicatos   = $request->input('ativarNosSindicatos')     ?? null;
        $fetrafiRs->videoYoutube          = $request->input('videoYoutube')            ?? '';
        $fetrafiRs->cartola               = $request->input('cartola')                 ?? '';
        $fetrafiRs->tags                  = $request->input('tags')                    ?? '';
        $fetrafiRs->titulo                = $request->input('tituloDaNoticia')         ?? '';
        $fetrafiRs->linhaDeApoio          = $request->input('linhaDeApoio')            ?? '';
        $fetrafiRs->texto                 = $request->input('texto')                   ?? '';
        $fetrafiRs->jornalistaResponsavel = $request->input('jornalistaResponsavel')   ?? '';
        $fetrafiRs->userIdUpdated         = Auth::id();

        $fetrafiRs->save();


        /**
         * Update Bancos
         */
        $bancos = $request->input('idsBancos');

        // Obtem os ids cadastrados para comparar com os novos
        $getOldIdsBancos = new NoticiaHasBanco();
        $resultOldIdsBancos = $getOldIdsBancos->where('noticia', '=', $request->input('idNoticia'));
        $oldIdsBancos = $resultOldIdsBancos->get()->toArray();
        
        // converte array in string
        if ( count($oldIdsBancos) )
        {
            $auxOldIdsBancos = $oldIdsBancos;
            $oldIdsBancos = [];

            foreach ($auxOldIdsBancos as $item) {
                $oldIdsBancos[] = $item['banco'];
            }

            $oldIdsBancos = implode(",", $oldIdsBancos);
        }
        else
        {
            $oldIdsBancos = '';
        }
        
        // Atualiza os bancos se as strings for diferentes, ou seja se houve alteração
        if ($bancos != $oldIdsBancos)
        {
            //dd($bancos);
            $bancosArray = explode(',', $bancos);
            // se existir algo registrado deleta
            if ( strlen($oldIdsBancos) ) {
                $resultOldIdsBancos->delete();
            }
            
            // Inseri os novos registros
            if ($bancos) {
                foreach ( $bancosArray as $item )
                {
                    $noticaHasBanco = new NoticiaHasBanco();
                    $noticaHasBanco->noticia = $fetrafiRs->id;
                    $noticaHasBanco->banco = $item;
    
                    $noticaHasBanco->save();
                }
            }
        }


        /**
         * Update Sindicatos
         */
        $sindicatos = $request->input('idsSindicatos');
        // Obtem os ids cadastrados para comparar com os novos
        $getOldIdsSindicatos = new NoticiaHasSindicato();
        $resultOldIdsSindicatos = $getOldIdsSindicatos->where('noticia', '=', $request->input('idNoticia'));
        $oldIdsSindicatos = $resultOldIdsSindicatos->get()->toArray();
        
        // converte array in string
        if ( count($oldIdsSindicatos) )
        {
            $auxOldIdsSindicatos = $oldIdsSindicatos;
            $oldIdsSindicatos = [];

            foreach ($auxOldIdsSindicatos as $item) {
                $oldIdsSindicatos[] = $item['sindicato'];
            }

            $oldIdsSindicatos = implode(",", $oldIdsSindicatos);
        }
        else
        {
            $oldIdsSindicatos = '';
        }

        // Atualiza os sindicatos se as strings for diferentes, ou seja se houve alteração
        if ($sindicatos != $oldIdsSindicatos)
        {
            $sindicatosArray = explode(',', $sindicatos);

            // se existir algo registrado deleta
            if ( strlen($oldIdsSindicatos) ) {
                $resultOldIdsSindicatos->delete();
            }

            // Inseri os novos registros
            if ($sindicatos) {
                foreach ( $sindicatosArray as $item )
                {
                    $noticaHasSindicato = new NoticiaHasSindicato();
                    $noticaHasSindicato->noticia = $fetrafiRs->id;
                    $noticaHasSindicato->sindicato = $item;
    
                    $noticaHasSindicato->save();
                }
            }
        }


        /**
         * Update Banner Destaque
         */
        $creditoBannerDestaque = new File();
        if ( $request->file('bannerDestaque') )
        {
            $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $fetrafiRs->bannerDestaque )->first();

            if ($creditoBannerDestaque) {
                $creditoBannerDestaque->delete();
            }

            $file = new Upload();
            $file->path = 'files/noticias';
            $file->creditfile = $request->input('creditoBannerDestaque') ?? null;
            $fileBannerDestaqueStored = $file->addFile( $request->file('bannerDestaque') );
            
            if ( count($fileBannerDestaqueStored) > 0 ) {
                $fetrafiRs->bannerDestaque = $fileBannerDestaqueStored['FileId'];
                $fetrafiRs->save();
            }
        }
        else
        {
            $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $fetrafiRs->bannerDestaque )->first();

            if ($creditoBannerDestaque) {
                $creditoBannerDestaque->creditfile = $request->input('creditoBannerDestaque') ?? null;
                $creditoBannerDestaque->save();
            }   
        }

        /**
         * Update Imagem Destaque
         */
        $creditoImagemDestaque = new File();
        if ( $request->file('imagemDestaque') )
        {
            $creditoImagemDestaque = $creditoImagemDestaque->where( 'id', $fetrafiRs->imagemDestaque )->first();

            if ($creditoImagemDestaque) {
                $creditoImagemDestaque->delete();
            }

            $file = new Upload();
            $file->path = 'files/noticias';
            $file->creditfile = $request->input('creditoImagemDestaque') ?? null;
            $fileIdImagemDestaqueStored = $file->addFile( $request->file('imagemDestaque') );
            
            if ( count($fileIdImagemDestaqueStored) > 0 ) {
                $fetrafiRs->imagemDestaque = $fileIdImagemDestaqueStored['FileId'];
                $fetrafiRs->save();
            }
        }
        else
        {
            $creditoImagemDestaque = $creditoImagemDestaque->where( 'id', $fetrafiRs->imagemDestaque )->first();

            if ($creditoImagemDestaque) {
                $creditoImagemDestaque->creditfile = $request->input('creditoImagemDestaque') ?? null;
                $creditoImagemDestaque->save();
            }   
        }

        /**
         * Update Podcast
         */
        if ( $request->file('filePodcast') )
        {
            $filePodcast = new File();
            $filePodcast = $filePodcast->where( 'id', $fetrafiRs->filePodcast )->first();
            $filePodcast->delete();

            $file = new Upload();
            $file->path = 'files/noticias';
            $filePodcastStored = $file->addFile( $request->file('filePodcast') );
            
            if ( count($filePodcastStored) > 0 ) {
                $fetrafiRs->filePodcast = $filePodcastStored['FileId'];
                $fetrafiRs->save();
            }
        }
    
        return redirect(url('adm/noticias'));
    }

    public function deletarNoticia(Request $request)
    {
        $fetrafiRs = new FetrafiRs();
        $delete = $fetrafiRs->find($request->input('id'));
        $delete->delete();
        return redirect(url('adm/noticias'));
    }
}
