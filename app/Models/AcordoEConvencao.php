<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class AcordoEConvencao extends Model
{
    use SoftDeletes;
    protected $table = 'acordos_e_convencoes';

    public function fileDestaque() {
        return $this->hasOne('App\Models\File', 'id', 'bannerDestaque');
    }

    public function filePodcast() {
        return $this->hasOne('App\Models\File', 'id', 'file');
    }


    /**
     * ADM
     * Metodos utilizados para o adm
     */

    public function listAllToAdmPageAcordosEConvencoes()
    {
        $list = DB::table('acordos_e_convencoes');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'acordos_e_convencoes.bannerDestaque');
        $list->leftjoin('files as filesFile', 'filesFile.id', '=', 'acordos_e_convencoes.file');
        $list->whereNull('acordos_e_convencoes.deleted_at');
                          
        $list->orderBy('acordos_e_convencoes.id', 'desc');

        $listAll = $list->addSelect('acordos_e_convencoes.id as id',
                                    'acordos_e_convencoes.ativo as ativo',
                                    'acordos_e_convencoes.entidade as entidade',
                                    'acordos_e_convencoes.titulo as titulo',
                                    'acordos_e_convencoes.subtitulo as subtitulo',
                                    'acordos_e_convencoes.cartola as cartola',
                                    'acordos_e_convencoes.tags as tags',
                                    'acordos_e_convencoes.linhaDeApoio as linhaDeApoio',
                                    'acordos_e_convencoes.jornalistaResponsavel as jornalistaResponsavel',
                                    'acordos_e_convencoes.bannerDestaque as bannerDestaque',
                                    'acordos_e_convencoes.file as file',
                                    'acordos_e_convencoes.dataInclusao as dataInclusao',
                                    'acordos_e_convencoes.dataLimiteNoDestaque as dataLimiteNoDestaque',
                                    'acordos_e_convencoes.horaLimiteNoDestaque as horaLimiteNoDestaque',
                                    'acordos_e_convencoes.ativarNosSindicatos as ativarNosSindicatos',
                                    'acordos_e_convencoes.userIdCreated as userIdCreated',
                                    'acordos_e_convencoes.userIdUpdated as userIdUpdated',
                                    'acordos_e_convencoes.created_at as created_at',
                                    'acordos_e_convencoes.updated_at as updated_at',

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


    public function findById($id)
    {
        $list = DB::table('acordos_e_convencoes');
        $list->leftjoin('files as filesBannerDestaque', 'filesBannerDestaque.id', '=', 'acordos_e_convencoes.bannerDestaque');
        $list->leftjoin('files as filesFile', 'filesFile.id', '=', 'acordos_e_convencoes.file');
        
        $list->where('acordos_e_convencoes.id', $id);
        
        $listAll = $list->addSelect('acordos_e_convencoes.id as id',
                                    'acordos_e_convencoes.ativo as ativo',
                                    'acordos_e_convencoes.entidade as entidade',
                                    'acordos_e_convencoes.titulo as titulo',
                                    'acordos_e_convencoes.subtitulo as subtitulo',
                                    'acordos_e_convencoes.cartola as cartola',
                                    'acordos_e_convencoes.tags as tags',
                                    'acordos_e_convencoes.linhaDeApoio as linhaDeApoio',
                                    'acordos_e_convencoes.jornalistaResponsavel as jornalistaResponsavel',
                                    'acordos_e_convencoes.bannerDestaque as bannerDestaque',
                                    'acordos_e_convencoes.file as file',
                                    'acordos_e_convencoes.dataInclusao as dataInclusao',
                                    'acordos_e_convencoes.dataLimiteNoDestaque as dataLimiteNoDestaque',
                                    'acordos_e_convencoes.horaLimiteNoDestaque as horaLimiteNoDestaque',
                                    'acordos_e_convencoes.ativarNosSindicatos as ativarNosSindicatos',
                                    'acordos_e_convencoes.userIdCreated as userIdCreated',
                                    'acordos_e_convencoes.userIdUpdated as userIdUpdated',
                                    'acordos_e_convencoes.created_at as created_at',
                                    'acordos_e_convencoes.updated_at as updated_at',

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
     * Site
     * Metodos utilizados para o site
     */

    public function listAllToSiteAcordosEConvencoes(): Array
    {
        $arrayYears = [];
        $arrayYearsWithEntity = [];
        $years = $this->getYears()->toArray();

        /**
         * Obtem a list de item por Ano
         */
        foreach ($years as $year)
        {
            $item = $this->listByYear($year)->toArray();
            if (count($item)) {
                $arrayYears[$year->dataInclusao] = ['year' => $year->dataInclusao, 'data' => $item];
            }
        }

        /**
         * Realiza o tratamento para separar por ano,
         * entidade e agrupa os registros por entidade
         */
        foreach ($arrayYears as $year)
        {
            $entity = '';
            $arrayEntitys = [];
            foreach ($year['data'] as $item)
            {
                if ($entity != $item->name_entidade)
                {
                    $entity = $item->name_entidade;
                }
                
                $arrayEntitys[$entity][] = $item;
            }

            $arrayYearsWithEntity[$year['year']] = $arrayEntitys;
            
        }

        return $arrayYearsWithEntity;
    }

    /**
     * Obtem somente a listagem dos Anos existente
     * dos registros pela "dataInclusao"
     */
    private function getYears()
    {
        // SELECT DATE_FORMAT(`dataInclusao`, '%Y') FROM acordos_e_convencoes
        // GROUP BY DATE_FORMAT(`dataInclusao`, '%Y')
        $list = DB::table('acordos_e_convencoes');
        $list->select( DB::raw('DATE_FORMAT(acordos_e_convencoes.dataInclusao, "%Y") as dataInclusao') );
        $list->groupBy('dataInclusao');
        $list->orderBy('dataInclusao', 'desc');

        return $list->distinct()->get();
    }

    /**
     * Obtem os registros filtrando pelo ano
     */
    private function listByYear($year)
    {
        $list = DB::table('acordos_e_convencoes');
        $list->leftjoin('entidades as E', 'E.id', '=', 'acordos_e_convencoes.entidade');
        $list->leftjoin('files as filesFile', 'filesFile.id', '=', 'acordos_e_convencoes.file');
        $list->whereRaw('YEAR(acordos_e_convencoes.dataInclusao) = ?', $year);
        $list->whereNull('acordos_e_convencoes.deleted_at');
        $list->orderBy('E.name', 'ASC');
        $list->orderBy('acordos_e_convencoes.titulo', 'ASC');
        
        $listAll = $list->addSelect('acordos_e_convencoes.id as id',
                                    'acordos_e_convencoes.ativo as ativo',
                                    'acordos_e_convencoes.entidade as entidade',
                                    'E.name as name_entidade',
                                    'acordos_e_convencoes.titulo as titulo',
                                    'acordos_e_convencoes.subtitulo as subtitulo',
                                    'acordos_e_convencoes.cartola as cartola',
                                    'acordos_e_convencoes.tags as tags',
                                    'acordos_e_convencoes.linhaDeApoio as linhaDeApoio',
                                    'acordos_e_convencoes.jornalistaResponsavel as jornalistaResponsavel',
                                    'acordos_e_convencoes.bannerDestaque as bannerDestaque',
                                    'acordos_e_convencoes.file as file',
                                    'acordos_e_convencoes.dataInclusao as dataInclusao',
                                    'acordos_e_convencoes.dataLimiteNoDestaque as dataLimiteNoDestaque',
                                    'acordos_e_convencoes.horaLimiteNoDestaque as horaLimiteNoDestaque',
                                    'acordos_e_convencoes.ativarNosSindicatos as ativarNosSindicatos',
                                    'acordos_e_convencoes.userIdCreated as userIdCreated',
                                    'acordos_e_convencoes.userIdUpdated as userIdUpdated',
                                    'acordos_e_convencoes.created_at as created_at',
                                    'acordos_e_convencoes.updated_at as updated_at',
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
        return $listAll->get();
    }
    
}
