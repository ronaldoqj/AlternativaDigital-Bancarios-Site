<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class Noticia extends Model
{
    use SoftDeletes;
    private $syndicate;
  
    
    /**
     * Metodos para o adm
     */
    public function fileDestaque() {
        return $this->hasOne('App\Models\File', 'id', 'bannerDestaque');
    }

    public function fileImagem() {
        return $this->hasOne('App\Models\File', 'id', 'imagemDestaque');
    }

    public function filePodcast() {
        return $this->hasOne('App\Models\File', 'id', 'filePodcast');
    }

    public function listAllToAdmPageNoticias($type = '*')
    {
        $list = DB::table('noticias');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'noticias.bannerDestaque');
        $list->leftjoin('files as filesImagemDestaque', 'filesImagemDestaque.id', '=', 'noticias.imagemDestaque');
        $list->leftjoin('files as filesFilesPodcasts', 'filesFilesPodcasts.id', '=', 'noticias.filePodcast');
        $list->whereNull('noticias.deleted_at');
        if ($type != '*') {
            $list->where('noticias.tipoDaNoticia', $type);
        }

        if ( (int)session()->get('configAdm')['entity'] ) {
            $list->where('noticias.entidade', (int)session()->get('configAdm')['entity']);
        } else {
            $list->whereNull('noticias.entidade');
        }
        $list->orderBy('noticias.id', 'desc');

        $listAll = $list->addSelect('noticias.id as id',
                                    'noticias.ativo as ativo',
                                    'noticias.tipoDaNoticia as tipoDaNoticia',
                                    'noticias.titulo as titulo',
                                    'noticias.subtitulo as subtitulo',
                                    'noticias.cartola as cartola',
                                    'noticias.tags as tags',
                                    'noticias.linhaDeApoio as linhaDeApoio',
                                    'noticias.texto as texto',
                                    'noticias.jornalistaResponsavel as jornalistaResponsavel',
                                    'noticias.bannerDestaque as bannerDestaque',
                                    'noticias.imagemDestaque as imagemDestaque',
                                    'noticias.filePodcast as filePodcast',
                                    'noticias.videoYoutube as videoYoutube',
                                    'noticias.dataInclusao as dataInclusao',
                                    'noticias.dataLimiteNoDestaque as dataLimiteNoDestaque',
                                    'noticias.horaLimiteNoDestaque as horaLimiteNoDestaque',
                                    'noticias.ativarNosSindicatos as ativarNosSindicatos',
                                    'noticias.userIdCreated as userIdCreated',
                                    'noticias.userIdUpdated as userIdUpdated',
                                    'noticias.created_at as created_at',
                                    'noticias.updated_at as updated_at',

                                    'filesBannerDestaque.id as fileBannerDestaque_id',
                                    'filesBannerDestaque.category as fileBannerDestaque_category',
                                    'filesBannerDestaque.pathfile as fileBannerDestaque_pathfile',
                                    'filesBannerDestaque.name as fileBannerDestaque_name',
                                    'filesBannerDestaque.namefile as fileBannerDestaque_namefile',
                                    'filesBannerDestaque.creditfile as fileBannerDestaque_creditfile',
                                    'filesBannerDestaque.namefilefull as fileBannerDestaque_namefilefull',
                                    'filesBannerDestaque.mimetype as fileBannerDestaque_mimetype',
                                    'filesBannerDestaque.extension as fileBannerDestaque_extension',
                                    'filesBannerDestaque.size as fileBannerDestaque_size',
                                    'filesBannerDestaque.type as fileBannerDestaque_type',
                                    'filesBannerDestaque.description as fileBannerDestaque_description',
                                    'filesBannerDestaque.alternativeText as fileBannerDestaque_alternativeText',
                                    'filesBannerDestaque.created_at as fileBannerDestaque_created_at',
                                    'filesBannerDestaque.updated_at as fileBannerDestaque_updated_at',
                                    
                                    'filesImagemDestaque.id as fileImagemDestaque_id',
                                    'filesImagemDestaque.category as fileImagemDestaque_category',
                                    'filesImagemDestaque.pathfile as fileImagemDestaque_pathfile',
                                    'filesImagemDestaque.name as fileImagemDestaque_name',
                                    'filesImagemDestaque.namefile as fileImagemDestaque_namefile',
                                    'filesImagemDestaque.creditfile as fileImagemDestaque_creditfile',
                                    'filesImagemDestaque.namefilefull as fileImagemDestaque_namefilefull',
                                    'filesImagemDestaque.mimetype as fileImagemDestaque_mimetype',
                                    'filesImagemDestaque.extension as fileImagemDestaque_extension',
                                    'filesImagemDestaque.size as fileImagemDestaque_size',
                                    'filesImagemDestaque.type as fileImagemDestaque_type',
                                    'filesImagemDestaque.description as fileImagemDestaque_description',
                                    'filesImagemDestaque.alternativeText as fileImagemDestaque_alternativeText',
                                    'filesImagemDestaque.created_at as fileImagemDestaque_created_at',
                                    'filesImagemDestaque.updated_at as fileImagemDestaque_updated_at',
                                    
                                    'filesFilesPodcasts.id as filePodcast_id',
                                    'filesFilesPodcasts.category as filePodcast_category',
                                    'filesFilesPodcasts.pathfile as filePodcast_pathfile',
                                    'filesFilesPodcasts.name as filePodcast_name',
                                    'filesFilesPodcasts.namefile as filePodcast_namefile',
                                    'filesFilesPodcasts.creditfile as filePodcast_creditfile',
                                    'filesFilesPodcasts.namefilefull as filePodcast_namefilefull',
                                    'filesFilesPodcasts.mimetype as filePodcast_mimetype',
                                    'filesFilesPodcasts.extension as filePodcast_extension',
                                    'filesFilesPodcasts.size as filePodcast_size',
                                    'filesFilesPodcasts.type as filePodcast_type',
                                    'filesFilesPodcasts.description as filePodcast_description',
                                    'filesFilesPodcasts.alternativeText as filePodcast_alternativeText',
                                    'filesFilesPodcasts.created_at as filePodcast_created_at',
                                    'filesFilesPodcasts.updated_at as filePodcast_updated_at');
        return $listAll;
    }

    /**
     * Metodos para o adm e site
     */
    public function findById($id)
    {
        $list = DB::table('noticias');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'noticias.bannerDestaque');
        $list->leftjoin('files as filesImagemDestaque', 'filesImagemDestaque.id', '=', 'noticias.imagemDestaque');
        $list->leftjoin('files as filesFilesPodcasts', 'filesFilesPodcasts.id', '=', 'noticias.filePodcast');
        
        $list->where('noticias.id', $id);
        
        $listAll = $list->addSelect('noticias.id as id',
                                    'noticias.ativo as ativo',
                                    'noticias.tipoDaNoticia as tipoDaNoticia',
                                    'noticias.titulo as titulo',
                                    'noticias.subtitulo as subtitulo',
                                    'noticias.cartola as cartola',
                                    'noticias.tags as tags',
                                    'noticias.linhaDeApoio as linhaDeApoio',
                                    'noticias.texto as texto',
                                    'noticias.jornalistaResponsavel as jornalistaResponsavel',
                                    'noticias.bannerDestaque as bannerDestaque',
                                    'noticias.imagemDestaque as imagemDestaque',
                                    'noticias.filePodcast as filePodcast',
                                    'noticias.videoYoutube as videoYoutube',
                                    'noticias.dataInclusao as dataInclusao',
                                    'noticias.dataLimiteNoDestaque as dataLimiteNoDestaque',
                                    'noticias.horaLimiteNoDestaque as horaLimiteNoDestaque',
                                    'noticias.ativarNosSindicatos as ativarNosSindicatos',
                                    'noticias.userIdCreated as userIdCreated',
                                    'noticias.userIdUpdated as userIdUpdated',
                                    'noticias.created_at as created_at',
                                    'noticias.updated_at as updated_at',

                                    'filesBannerDestaque.id as fileBannerDestaque_id',
                                    'filesBannerDestaque.category as fileBannerDestaque_category',
                                    'filesBannerDestaque.pathfile as fileBannerDestaque_pathfile',
                                    'filesBannerDestaque.name as fileBannerDestaque_name',
                                    'filesBannerDestaque.namefile as fileBannerDestaque_namefile',
                                    'filesBannerDestaque.creditfile as fileBannerDestaque_creditfile',
                                    'filesBannerDestaque.namefilefull as fileBannerDestaque_namefilefull',
                                    'filesBannerDestaque.mimetype as fileBannerDestaque_mimetype',
                                    'filesBannerDestaque.extension as fileBannerDestaque_extension',
                                    'filesBannerDestaque.size as fileBannerDestaque_size',
                                    'filesBannerDestaque.type as fileBannerDestaque_type',
                                    'filesBannerDestaque.description as fileBannerDestaque_description',
                                    'filesBannerDestaque.alternativeText as fileBannerDestaque_alternativeText',
                                    'filesBannerDestaque.created_at as fileBannerDestaque_created_at',
                                    'filesBannerDestaque.updated_at as fileBannerDestaque_updated_at',
                                    
                                    'filesImagemDestaque.id as fileImagemDestaque_id',
                                    'filesImagemDestaque.category as fileImagemDestaque_category',
                                    'filesImagemDestaque.pathfile as fileImagemDestaque_pathfile',
                                    'filesImagemDestaque.name as fileImagemDestaque_name',
                                    'filesImagemDestaque.namefile as fileImagemDestaque_namefile',
                                    'filesImagemDestaque.creditfile as fileImagemDestaque_creditfile',
                                    'filesImagemDestaque.namefilefull as fileImagemDestaque_namefilefull',
                                    'filesImagemDestaque.mimetype as fileImagemDestaque_mimetype',
                                    'filesImagemDestaque.extension as fileImagemDestaque_extension',
                                    'filesImagemDestaque.size as fileImagemDestaque_size',
                                    'filesImagemDestaque.type as fileImagemDestaque_type',
                                    'filesImagemDestaque.description as fileImagemDestaque_description',
                                    'filesImagemDestaque.alternativeText as fileImagemDestaque_alternativeText',
                                    'filesImagemDestaque.created_at as fileImagemDestaque_created_at',
                                    'filesImagemDestaque.updated_at as fileImagemDestaque_updated_at',
                                    
                                    'filesFilesPodcasts.id as filePodcast_id',
                                    'filesFilesPodcasts.category as filePodcast_category',
                                    'filesFilesPodcasts.pathfile as filePodcast_pathfile',
                                    'filesFilesPodcasts.name as filePodcast_name',
                                    'filesFilesPodcasts.namefile as filePodcast_namefile',
                                    'filesFilesPodcasts.creditfile as filePodcast_creditfile',
                                    'filesFilesPodcasts.namefilefull as filePodcast_namefilefull',
                                    'filesFilesPodcasts.mimetype as filePodcast_mimetype',
                                    'filesFilesPodcasts.extension as filePodcast_extension',
                                    'filesFilesPodcasts.size as filePodcast_size',
                                    'filesFilesPodcasts.type as filePodcast_type',
                                    'filesFilesPodcasts.description as filePodcast_description',
                                    'filesFilesPodcasts.alternativeText as filePodcast_alternativeText',
                                    'filesFilesPodcasts.created_at as filePodcast_created_at',
                                    'filesFilesPodcasts.updated_at as filePodcast_updated_at')->first();
        return $listAll;
    }

    public function findSindicatosByIdNoticia($idNoticia)
    {
        $list = DB::table('noticias_has_sindicatos');
        $list->join('sindicatos', 'sindicatos.id', '=', 'noticias_has_sindicatos.sindicato');
        $list->where('noticia', $idNoticia);

        $listAll = $list->addSelect('noticias_has_sindicatos.id as id',
                                    'noticias_has_sindicatos.noticia as noticia',
                                    'noticias_has_sindicatos.sindicato as sindicato',
                                    'sindicatos.name as name');

        return $listAll;
    }
    
    public function findBancosByIdNoticia($idNoticia)
    {
        $list = DB::table('noticias_has_bancos');
        $list->join('bancos', 'bancos.id', '=', 'noticias_has_bancos.banco');
        $list->where('noticia', $idNoticia);

        $listAll = $list->addSelect('noticias_has_bancos.id as id',
                                    'noticias_has_bancos.noticia as noticia',
                                    'noticias_has_bancos.banco as banco',
                                    'bancos.name as name');

        return $listAll;
    }

    /**
     * Metodos para o site
     */
    public function getDestaques()
    {
        $list = DB::table('noticias');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'noticias.bannerDestaque');
        $list->leftjoin('files as filesImagemDestaque', 'filesImagemDestaque.id', '=', 'noticias.imagemDestaque');
        $list->whereNull('noticias.deleted_at');
        $list->where('ativo', 'S');
        $list->where('noticias.tipoDaNoticia', 'noticia-destaque');
        $list->where('ativo', 'S');

        $list->addSelect('noticias.id as id',
                         'noticias.ativo as ativo',
                         'noticias.tipoDaNoticia as tipoDaNoticia',
                         'noticias.titulo as titulo',
                         'noticias.subtitulo as subtitulo',
                         'noticias.cartola as cartola',
                         'noticias.tags as tags',
                         'noticias.linhaDeApoio as linhaDeApoio',
                         'noticias.texto as texto',
                         'noticias.jornalistaResponsavel as jornalistaResponsavel',
                         'noticias.bannerDestaque as bannerDestaque',
                         'noticias.imagemDestaque as imagemDestaque',
                         'noticias.filePodcast as filePodcast',
                         'noticias.videoYoutube as videoYoutube',
                         'noticias.dataInclusao as dataInclusao',
                         'noticias.dataLimiteNoDestaque as dataLimiteNoDestaque',
                         'noticias.horaLimiteNoDestaque as horaLimiteNoDestaque',
                         'noticias.ativarNosSindicatos as ativarNosSindicatos',
                         'noticias.userIdCreated as userIdCreated',
                         'noticias.userIdUpdated as userIdUpdated',
                         'noticias.created_at as created_at',
                         'noticias.updated_at as updated_at',

                         'filesBannerDestaque.id as fileBannerDestaque_id',
                         'filesBannerDestaque.category as fileBannerDestaque_category',
                         'filesBannerDestaque.pathfile as fileBannerDestaque_pathfile',
                         'filesBannerDestaque.name as fileBannerDestaque_name',
                         'filesBannerDestaque.namefile as fileBannerDestaque_namefile',
                         'filesBannerDestaque.creditfile as fileBannerDestaque_creditfile',
                         'filesBannerDestaque.namefilefull as fileBannerDestaque_namefilefull',
                         'filesBannerDestaque.mimetype as fileBannerDestaque_mimetype',
                         'filesBannerDestaque.extension as fileBannerDestaque_extension',
                         'filesBannerDestaque.size as fileBannerDestaque_size',
                         'filesBannerDestaque.type as fileBannerDestaque_type',
                         'filesBannerDestaque.description as fileBannerDestaque_description',
                         'filesBannerDestaque.alternativeText as fileBannerDestaque_alternativeText',
                         'filesBannerDestaque.created_at as fileBannerDestaque_created_at',
                         'filesBannerDestaque.updated_at as fileBannerDestaque_updated_at',
                            
                         'filesImagemDestaque.id as fileImagemDestaque_id',
                         'filesImagemDestaque.category as fileImagemDestaque_category',
                         'filesImagemDestaque.pathfile as fileImagemDestaque_pathfile',
                         'filesImagemDestaque.name as fileImagemDestaque_name',
                         'filesImagemDestaque.namefile as fileImagemDestaque_namefile',
                         'filesImagemDestaque.creditfile as fileImagemDestaque_creditfile',
                         'filesImagemDestaque.namefilefull as fileImagemDestaque_namefilefull',
                         'filesImagemDestaque.mimetype as fileImagemDestaque_mimetype',
                         'filesImagemDestaque.extension as fileImagemDestaque_extension',
                         'filesImagemDestaque.size as fileImagemDestaque_size',
                         'filesImagemDestaque.type as fileImagemDestaque_type',
                         'filesImagemDestaque.description as fileImagemDestaque_description',
                         'filesImagemDestaque.alternativeText as fileImagemDestaque_alternativeText',
                         'filesImagemDestaque.created_at as fileImagemDestaque_created_at',
                         'filesImagemDestaque.updated_at as fileImagemDestaque_updated_at');

        return $list;
    }

    private function checkBank($request): bool
    {
        $check = false;

        if ( is_numeric($request->input('banco')) )
        {
            $bancoPesquisa = new Banco();
            $bancoPesquisa = $bancoPesquisa->find($request->input('banco'));

            if ($bancoPesquisa)
            {
                if ($bancoPesquisa->count()) {
                    $check = true;
                }
            }
        }

        return $check;
    }

    
    public function getNoticias($request, $notIDs = []): Builder
    {
        $list = DB::table('noticias');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'noticias.bannerDestaque');
        $list->leftjoin('files as filesImagemDestaque', 'filesImagemDestaque.id', '=', 'noticias.imagemDestaque');
        $list->leftjoin('files as filesFilesPodcasts', 'filesFilesPodcasts.id', '=', 'noticias.filePodcast');
        
        $list->whereNull('noticias.deleted_at');
        $list->where('ativo', 'S');

        if (count($notIDs)) {
            $list->whereNotIn('noticias.id', $notIDs);
        }
        
        /** Portal */
        if (! $request->syndicate)
        {
            $list->whereNull('noticias.entidade');
        }
        /** Sindicato */
        else
        {
            $this->syndicate = $request->syndicate['id'];
            $list->join('noticias_has_sindicatos', function($join)
            {   
                    $join->on('noticias_has_sindicatos.noticia', '=', 'noticias.id')
                         ->where('noticias_has_sindicatos.sindicato', '=', $this->syndicate);
            });
        }

        
        if ( $this->checkBank($request) )
        {
            $list->join('noticias_has_bancos as noticiasHasBancos', 'noticiasHasBancos.noticia', '=', 'noticias.id');
            $list->where('noticiasHasBancos.banco', $request->input('banco'));
            
            /** Pode ser realizado desta maneira */
            // $list->join('noticias_has_bancos as noticiasHasBancos', 'noticiasHasBancos.noticia', '=', 'noticias.id');
            // $list->where('noticiasHasBancos.banco', $idbanco);
            
            /** Ou assim */
            // $list->join('noticias_has_bancos', function($join) use ( $idbanco )
            // {
            //     $join->on('noticias_has_bancos.noticia', '=', 'noticias.id')
            //          ->where('noticias_has_bancos.banco', '=', $idbanco);
            // });
        }

        $list->orderBy('noticias.dataInclusao', 'desc');
        $list->addSelect('noticias.id as id',
                         'noticias.ativo as ativo',
                         'noticias.tipoDaNoticia as tipoDaNoticia',
                         'noticias.titulo as titulo',
                         'noticias.subtitulo as subtitulo',
                         'noticias.cartola as cartola',
                         'noticias.tags as tags',
                         'noticias.linhaDeApoio as linhaDeApoio',
                         'noticias.texto as texto',
                         'noticias.jornalistaResponsavel as jornalistaResponsavel',
                         'noticias.bannerDestaque as bannerDestaque',
                         'noticias.imagemDestaque as imagemDestaque',
                         'noticias.filePodcast as filePodcast',
                         'noticias.videoYoutube as videoYoutube',
                         'noticias.dataInclusao as dataInclusao',
                         'noticias.dataLimiteNoDestaque as dataLimiteNoDestaque',
                         'noticias.horaLimiteNoDestaque as horaLimiteNoDestaque',
                         'noticias.ativarNosSindicatos as ativarNosSindicatos',
                         'noticias.userIdCreated as userIdCreated',
                         'noticias.userIdUpdated as userIdUpdated',
                         'noticias.created_at as created_at',
                         'noticias.updated_at as updated_at',

                         'filesBannerDestaque.id as fileBannerDestaque_id',
                         'filesBannerDestaque.category as fileBannerDestaque_category',
                         'filesBannerDestaque.pathfile as fileBannerDestaque_pathfile',
                         'filesBannerDestaque.name as fileBannerDestaque_name',
                         'filesBannerDestaque.namefile as fileBannerDestaque_namefile',
                         'filesBannerDestaque.creditfile as fileBannerDestaque_creditfile',
                         'filesBannerDestaque.namefilefull as fileBannerDestaque_namefilefull',
                         'filesBannerDestaque.mimetype as fileBannerDestaque_mimetype',
                         'filesBannerDestaque.extension as fileBannerDestaque_extension',
                         'filesBannerDestaque.size as fileBannerDestaque_size',
                         'filesBannerDestaque.type as fileBannerDestaque_type',
                         'filesBannerDestaque.description as fileBannerDestaque_description',
                         'filesBannerDestaque.alternativeText as fileBannerDestaque_alternativeText',
                         'filesBannerDestaque.created_at as fileBannerDestaque_created_at',
                         'filesBannerDestaque.updated_at as fileBannerDestaque_updated_at',
                                    
                         'filesImagemDestaque.id as fileImagemDestaque_id',
                         'filesImagemDestaque.category as fileImagemDestaque_category',
                         'filesImagemDestaque.pathfile as fileImagemDestaque_pathfile',
                         'filesImagemDestaque.name as fileImagemDestaque_name',
                         'filesImagemDestaque.namefile as fileImagemDestaque_namefile',
                         'filesImagemDestaque.creditfile as fileImagemDestaque_creditfile',
                         'filesImagemDestaque.namefilefull as fileImagemDestaque_namefilefull',
                         'filesImagemDestaque.mimetype as fileImagemDestaque_mimetype',
                         'filesImagemDestaque.extension as fileImagemDestaque_extension',
                         'filesImagemDestaque.size as fileImagemDestaque_size',
                         'filesImagemDestaque.type as fileImagemDestaque_type',
                         'filesImagemDestaque.description as fileImagemDestaque_description',
                         'filesImagemDestaque.alternativeText as fileImagemDestaque_alternativeText',
                         'filesImagemDestaque.created_at as fileImagemDestaque_created_at',
                         'filesImagemDestaque.updated_at as fileImagemDestaque_updated_at',
                                    
                         'filesFilesPodcasts.id as filePodcast_id',
                         'filesFilesPodcasts.category as filePodcast_category',
                         'filesFilesPodcasts.pathfile as filePodcast_pathfile',
                         'filesFilesPodcasts.name as filePodcast_name',
                         'filesFilesPodcasts.namefile as filePodcast_namefile',
                         'filesFilesPodcasts.creditfile as filePodcast_creditfile',
                         'filesFilesPodcasts.namefilefull as filePodcast_namefilefull',
                         'filesFilesPodcasts.mimetype as filePodcast_mimetype',
                         'filesFilesPodcasts.extension as filePodcast_extension',
                         'filesFilesPodcasts.size as filePodcast_size',
                         'filesFilesPodcasts.type as filePodcast_type',
                         'filesFilesPodcasts.description as filePodcast_description',
                         'filesFilesPodcasts.alternativeText as filePodcast_alternativeText',
                         'filesFilesPodcasts.created_at as filePodcast_created_at',
                         'filesFilesPodcasts.updated_at as filePodcast_updated_at');

        return $list;
    }

    public function searchPageSearch(String $search)
    {
        $list = DB::table('noticias');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'noticias.bannerDestaque');
        $list->leftjoin('files as filesImagemDestaque', 'filesImagemDestaque.id', '=', 'noticias.imagemDestaque');
        $list->leftjoin('files as filesFilesPodcasts', 'filesFilesPodcasts.id', '=', 'noticias.filePodcast');


        $list->whereNull('noticias.deleted_at');
        $list->where('ativo', 'S');


        $list->where('noticias.titulo', 'like', '%'.$search.'%');
        $list->orWhere('noticias.subtitulo', 'like', '%'.$search.'%');
        $list->orWhere('noticias.cartola', 'like', '%'.$search.'%');
        $list->orWhere('noticias.tags', 'like', '%'.$search.'%');
        $list->orWhere('noticias.linhaDeApoio', 'like', '%'.$search.'%');


        $list->orderBy('noticias.dataInclusao', 'desc');

        $listAll = $list->addSelect('noticias.id as id',
                                    'noticias.ativo as ativo',
                                    'noticias.tipoDaNoticia as tipoDaNoticia',
                                    'noticias.titulo as titulo',
                                    'noticias.subtitulo as subtitulo',
                                    'noticias.cartola as cartola',
                                    'noticias.tags as tags',
                                    'noticias.linhaDeApoio as linhaDeApoio',
                                    'noticias.texto as texto',
                                    'noticias.jornalistaResponsavel as jornalistaResponsavel',
                                    'noticias.bannerDestaque as bannerDestaque',
                                    'noticias.imagemDestaque as imagemDestaque',
                                    'noticias.filePodcast as filePodcast',
                                    'noticias.videoYoutube as videoYoutube',
                                    'noticias.dataInclusao as dataInclusao',
                                    'noticias.dataLimiteNoDestaque as dataLimiteNoDestaque',
                                    'noticias.horaLimiteNoDestaque as horaLimiteNoDestaque',
                                    'noticias.ativarNosSindicatos as ativarNosSindicatos',
                                    'noticias.userIdCreated as userIdCreated',
                                    'noticias.userIdUpdated as userIdUpdated',
                                    'noticias.created_at as created_at',
                                    'noticias.updated_at as updated_at',

                                    'filesBannerDestaque.id as fileBannerDestaque_id',
                                    'filesBannerDestaque.category as fileBannerDestaque_category',
                                    'filesBannerDestaque.pathfile as fileBannerDestaque_pathfile',
                                    'filesBannerDestaque.name as fileBannerDestaque_name',
                                    'filesBannerDestaque.namefile as fileBannerDestaque_namefile',
                                    'filesBannerDestaque.creditfile as fileBannerDestaque_creditfile',
                                    'filesBannerDestaque.namefilefull as fileBannerDestaque_namefilefull',
                                    'filesBannerDestaque.mimetype as fileBannerDestaque_mimetype',
                                    'filesBannerDestaque.extension as fileBannerDestaque_extension',
                                    'filesBannerDestaque.size as fileBannerDestaque_size',
                                    'filesBannerDestaque.type as fileBannerDestaque_type',
                                    'filesBannerDestaque.description as fileBannerDestaque_description',
                                    'filesBannerDestaque.alternativeText as fileBannerDestaque_alternativeText',
                                    'filesBannerDestaque.created_at as fileBannerDestaque_created_at',
                                    'filesBannerDestaque.updated_at as fileBannerDestaque_updated_at',
                                    
                                    'filesImagemDestaque.id as fileImagemDestaque_id',
                                    'filesImagemDestaque.category as fileImagemDestaque_category',
                                    'filesImagemDestaque.pathfile as fileImagemDestaque_pathfile',
                                    'filesImagemDestaque.name as fileImagemDestaque_name',
                                    'filesImagemDestaque.namefile as fileImagemDestaque_namefile',
                                    'filesImagemDestaque.creditfile as fileImagemDestaque_creditfile',
                                    'filesImagemDestaque.namefilefull as fileImagemDestaque_namefilefull',
                                    'filesImagemDestaque.mimetype as fileImagemDestaque_mimetype',
                                    'filesImagemDestaque.extension as fileImagemDestaque_extension',
                                    'filesImagemDestaque.size as fileImagemDestaque_size',
                                    'filesImagemDestaque.type as fileImagemDestaque_type',
                                    'filesImagemDestaque.description as fileImagemDestaque_description',
                                    'filesImagemDestaque.alternativeText as fileImagemDestaque_alternativeText',
                                    'filesImagemDestaque.created_at as fileImagemDestaque_created_at',
                                    'filesImagemDestaque.updated_at as fileImagemDestaque_updated_at',
                                    
                                    'filesFilesPodcasts.id as filePodcast_id',
                                    'filesFilesPodcasts.category as filePodcast_category',
                                    'filesFilesPodcasts.pathfile as filePodcast_pathfile',
                                    'filesFilesPodcasts.name as filePodcast_name',
                                    'filesFilesPodcasts.namefile as filePodcast_namefile',
                                    'filesFilesPodcasts.creditfile as filePodcast_creditfile',
                                    'filesFilesPodcasts.namefilefull as filePodcast_namefilefull',
                                    'filesFilesPodcasts.mimetype as filePodcast_mimetype',
                                    'filesFilesPodcasts.extension as filePodcast_extension',
                                    'filesFilesPodcasts.size as filePodcast_size',
                                    'filesFilesPodcasts.type as filePodcast_type',
                                    'filesFilesPodcasts.description as filePodcast_description',
                                    'filesFilesPodcasts.alternativeText as filePodcast_alternativeText',
                                    'filesFilesPodcasts.created_at as filePodcast_created_at',
                                    'filesFilesPodcasts.updated_at as filePodcast_updated_at');
        return $listAll->get();
    }


    public function sugestoesDeNoticias($id)
    {

        $list = DB::table('noticias');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'noticias.bannerDestaque');
        $list->leftjoin('files as filesImagemDestaque', 'filesImagemDestaque.id', '=', 'noticias.imagemDestaque');
        $list->leftjoin('files as filesFilesPodcasts', 'filesFilesPodcasts.id', '=', 'noticias.filePodcast');
        $list->whereNull('noticias.deleted_at');
        $list->where('ativo', 'S');
        $list->whereNotIn('noticias.id', [$id]);
                      
        $list->orderBy('noticias.dataInclusao', 'desc');
        $list->limit(3);

        $listAll = $list->addSelect('noticias.id as id',
                                    'noticias.ativo as ativo',
                                    'noticias.tipoDaNoticia as tipoDaNoticia',
                                    'noticias.titulo as titulo',
                                    'noticias.subtitulo as subtitulo',
                                    'noticias.cartola as cartola',
                                    'noticias.tags as tags',
                                    'noticias.linhaDeApoio as linhaDeApoio',
                                    'noticias.texto as texto',
                                    'noticias.jornalistaResponsavel as jornalistaResponsavel',
                                    'noticias.bannerDestaque as bannerDestaque',
                                    'noticias.imagemDestaque as imagemDestaque',
                                    'noticias.filePodcast as filePodcast',
                                    'noticias.videoYoutube as videoYoutube',
                                    'noticias.dataInclusao as dataInclusao',
                                    'noticias.dataLimiteNoDestaque as dataLimiteNoDestaque',
                                    'noticias.horaLimiteNoDestaque as horaLimiteNoDestaque',
                                    'noticias.ativarNosSindicatos as ativarNosSindicatos',
                                    'noticias.userIdCreated as userIdCreated',
                                    'noticias.userIdUpdated as userIdUpdated',
                                    'noticias.created_at as created_at',
                                    'noticias.updated_at as updated_at',

                                    'filesBannerDestaque.id as fileBannerDestaque_id',
                                    'filesBannerDestaque.category as fileBannerDestaque_category',
                                    'filesBannerDestaque.pathfile as fileBannerDestaque_pathfile',
                                    'filesBannerDestaque.name as fileBannerDestaque_name',
                                    'filesBannerDestaque.namefile as fileBannerDestaque_namefile',
                                    'filesBannerDestaque.creditfile as fileBannerDestaque_creditfile',
                                    'filesBannerDestaque.namefilefull as fileBannerDestaque_namefilefull',
                                    'filesBannerDestaque.mimetype as fileBannerDestaque_mimetype',
                                    'filesBannerDestaque.extension as fileBannerDestaque_extension',
                                    'filesBannerDestaque.size as fileBannerDestaque_size',
                                    'filesBannerDestaque.type as fileBannerDestaque_type',
                                    'filesBannerDestaque.description as fileBannerDestaque_description',
                                    'filesBannerDestaque.alternativeText as fileBannerDestaque_alternativeText',
                                    'filesBannerDestaque.created_at as fileBannerDestaque_created_at',
                                    'filesBannerDestaque.updated_at as fileBannerDestaque_updated_at',
                                    
                                    'filesImagemDestaque.id as fileImagemDestaque_id',
                                    'filesImagemDestaque.category as fileImagemDestaque_category',
                                    'filesImagemDestaque.pathfile as fileImagemDestaque_pathfile',
                                    'filesImagemDestaque.name as fileImagemDestaque_name',
                                    'filesImagemDestaque.namefile as fileImagemDestaque_namefile',
                                    'filesImagemDestaque.creditfile as fileImagemDestaque_creditfile',
                                    'filesImagemDestaque.namefilefull as fileImagemDestaque_namefilefull',
                                    'filesImagemDestaque.mimetype as fileImagemDestaque_mimetype',
                                    'filesImagemDestaque.extension as fileImagemDestaque_extension',
                                    'filesImagemDestaque.size as fileImagemDestaque_size',
                                    'filesImagemDestaque.type as fileImagemDestaque_type',
                                    'filesImagemDestaque.description as fileImagemDestaque_description',
                                    'filesImagemDestaque.alternativeText as fileImagemDestaque_alternativeText',
                                    'filesImagemDestaque.created_at as fileImagemDestaque_created_at',
                                    'filesImagemDestaque.updated_at as fileImagemDestaque_updated_at',
                                    
                                    'filesFilesPodcasts.id as filePodcast_id',
                                    'filesFilesPodcasts.category as filePodcast_category',
                                    'filesFilesPodcasts.pathfile as filePodcast_pathfile',
                                    'filesFilesPodcasts.name as filePodcast_name',
                                    'filesFilesPodcasts.namefile as filePodcast_namefile',
                                    'filesFilesPodcasts.creditfile as filePodcast_creditfile',
                                    'filesFilesPodcasts.namefilefull as filePodcast_namefilefull',
                                    'filesFilesPodcasts.mimetype as filePodcast_mimetype',
                                    'filesFilesPodcasts.extension as filePodcast_extension',
                                    'filesFilesPodcasts.size as filePodcast_size',
                                    'filesFilesPodcasts.type as filePodcast_type',
                                    'filesFilesPodcasts.description as filePodcast_description',
                                    'filesFilesPodcasts.alternativeText as filePodcast_alternativeText',
                                    'filesFilesPodcasts.created_at as filePodcast_created_at',
                                    'filesFilesPodcasts.updated_at as filePodcast_updated_at');
        return $listAll;

    }

}
