<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Edital extends Model
{
    use SoftDeletes;
    protected $table = 'editais';

    public function fileDestaque() {
        return $this->hasOne('App\Models\File', 'id', 'bannerDestaque');
    }

    public function filePodcast() {
        return $this->hasOne('App\Models\File', 'id', 'file');
    }


    /**
     * Adm 
     */
    public function listAllToAdmPageEditais()
    {
        $list = DB::table('editais');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'editais.bannerDestaque');
        $list->leftjoin('files as filesFile', 'filesFile.id', '=', 'editais.file');
        $list->whereNull('editais.deleted_at');
                          
        $list->orderBy('editais.dataInclusao', 'desc');

        $listAll = $list->addSelect('editais.id as id',
                                    'editais.ativo as ativo',
                                    'editais.titulo as titulo',
                                    'editais.subtitulo as subtitulo',
                                    'editais.cartola as cartola',
                                    'editais.tags as tags',
                                    'editais.linhaDeApoio as linhaDeApoio',
                                    'editais.jornalistaResponsavel as jornalistaResponsavel',
                                    'editais.bannerDestaque as bannerDestaque',
                                    'editais.file as file',
                                    'editais.dataInclusao as dataInclusao',
                                    'editais.dataLimiteNoDestaque as dataLimiteNoDestaque',
                                    'editais.horaLimiteNoDestaque as horaLimiteNoDestaque',
                                    'editais.ativarNosSindicatos as ativarNosSindicatos',
                                    'editais.userIdCreated as userIdCreated',
                                    'editais.userIdUpdated as userIdUpdated',
                                    'editais.created_at as created_at',
                                    'editais.updated_at as updated_at',

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
                                    
                                    'filesFile.id as file_id',
                                    'filesFile.category as file_category',
                                    'filesFile.pathfile as file_pathfile',
                                    'filesFile.name as file_name',
                                    'filesFile.namefile as file_namefile',
                                    'filesFile.creditfile as file_creditfile',
                                    'filesFile.namefilefull as file_namefilefull',
                                    'filesFile.mimetype as file_mimetype',
                                    'filesFile.extension as file_extension',
                                    'filesFile.size as file_size',
                                    'filesFile.type as file_type',
                                    'filesFile.description as file_description',
                                    'filesFile.alternativeText as file_alternativeText',
                                    'filesFile.created_at as file_created_at',
                                    'filesFile.updated_at as file_updated_at');
        return $listAll;
    }


    /**
     * Comum a todos
     */
    public function findById($id)
    {
        $list = DB::table('editais');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'editais.bannerDestaque');
        $list->leftjoin('files as filesFile', 'filesFile.id', '=', 'editais.file');
        
        $list->where('editais.id', $id);
        
        $listAll = $list->addSelect('editais.id as id',
                                    'editais.ativo as ativo',
                                    'editais.titulo as titulo',
                                    'editais.subtitulo as subtitulo',
                                    'editais.cartola as cartola',
                                    'editais.tags as tags',
                                    'editais.linhaDeApoio as linhaDeApoio',
                                    'editais.jornalistaResponsavel as jornalistaResponsavel',
                                    'editais.bannerDestaque as bannerDestaque',
                                    'editais.file as file',
                                    'editais.dataInclusao as dataInclusao',
                                    'editais.dataLimiteNoDestaque as dataLimiteNoDestaque',
                                    'editais.horaLimiteNoDestaque as horaLimiteNoDestaque',
                                    'editais.ativarNosSindicatos as ativarNosSindicatos',
                                    'editais.userIdCreated as userIdCreated',
                                    'editais.userIdUpdated as userIdUpdated',
                                    'editais.created_at as created_at',
                                    'editais.updated_at as updated_at',

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
                                    
                                    'filesFile.id as file_id',
                                    'filesFile.category as file_category',
                                    'filesFile.pathfile as file_pathfile',
                                    'filesFile.name as file_name',
                                    'filesFile.namefile as file_namefile',
                                    'filesFile.creditfile as file_creditfile',
                                    'filesFile.namefilefull as file_namefilefull',
                                    'filesFile.mimetype as file_mimetype',
                                    'filesFile.extension as file_extension',
                                    'filesFile.size as file_size',
                                    'filesFile.type as file_type',
                                    'filesFile.description as file_description',
                                    'filesFile.alternativeText as file_alternativeText',
                                    'filesFile.created_at as file_created_at',
                                    'filesFile.updated_at as file_updated_at')->first();
        return $listAll;
    }

    /**
     * site 
     */
    public function listAllToSitePageEditais()
    {
        $list = DB::table('editais');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'editais.bannerDestaque');
        $list->leftjoin('files as filesFile', 'filesFile.id', '=', 'editais.file');
        $list->where('editais.ativo', 'S');
        $list->whereNull('editais.deleted_at');
                          
        $list->orderBy('editais.dataInclusao', 'desc');

        $listAll = $list->addSelect('editais.id as id',
                                    'editais.ativo as ativo',
                                    'editais.titulo as titulo',
                                    'editais.subtitulo as subtitulo',
                                    'editais.cartola as cartola',
                                    'editais.tags as tags',
                                    'editais.linhaDeApoio as linhaDeApoio',
                                    'editais.jornalistaResponsavel as jornalistaResponsavel',
                                    'editais.bannerDestaque as bannerDestaque',
                                    'editais.file as file',
                                    'editais.dataInclusao as dataInclusao',
                                    'editais.dataLimiteNoDestaque as dataLimiteNoDestaque',
                                    'editais.horaLimiteNoDestaque as horaLimiteNoDestaque',
                                    'editais.ativarNosSindicatos as ativarNosSindicatos',
                                    'editais.userIdCreated as userIdCreated',
                                    'editais.userIdUpdated as userIdUpdated',
                                    'editais.created_at as created_at',
                                    'editais.updated_at as updated_at',

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
                                    
                                    'filesFile.id as file_id',
                                    'filesFile.category as file_category',
                                    'filesFile.pathfile as file_pathfile',
                                    'filesFile.name as file_name',
                                    'filesFile.namefile as file_namefile',
                                    'filesFile.creditfile as file_creditfile',
                                    'filesFile.namefilefull as file_namefilefull',
                                    'filesFile.mimetype as file_mimetype',
                                    'filesFile.extension as file_extension',
                                    'filesFile.size as file_size',
                                    'filesFile.type as file_type',
                                    'filesFile.description as file_description',
                                    'filesFile.alternativeText as file_alternativeText',
                                    'filesFile.created_at as file_created_at',
                                    'filesFile.updated_at as file_updated_at');
        return $listAll;
    }
}
