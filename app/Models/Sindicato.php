<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use DB;

class Sindicato extends Model
{
    use SoftDeletes;

    /**
     * Adm 
     */
    public function listAllToAdmPageSindicatos()
    {
        $list = DB::table('sindicatos');
        $list->leftjoin('files as logo', 'logo.id', '=', 'sindicatos.logo');
        $list->whereNull('sindicatos.deleted_at');
                          
        $list->orderBy('sindicatos.created_at', 'desc');

        $listAll = $list->addSelect(
            'sindicatos.id          as id',
            'sindicatos.ativo       as ativo',
            'sindicatos.name        as name',
            'sindicatos.subdomain   as subdomain',
            'sindicatos.logo        as logo',
            'sindicatos.deleted_at  as deleted_at',
            'sindicatos.created_at  as created_at',
            'sindicatos.updated_at  as updated_at',

            'logo.pathfile          as logo_pathfile',
            'logo.namefile          as logo_namefile',
            'logo.deleted_at        as logo_deleted_at'
        );
        return $listAll;
    }


    /**
     * Comum a todos
     */
    public function findById($id)
    {
        $list = DB::table('sindicatos');
        $list->leftjoin('files as banner', 'banner.id', '=', 'sindicatos.banner');
        $list->leftjoin('files as logo', 'logo.id', '=', 'sindicatos.logo');
        $list->where('sindicatos.id', $id);
        
        $listAll = $list->addSelect(
            'sindicatos.id          as id',
            'sindicatos.ativo       as ativo',
            'sindicatos.name        as name',
            'sindicatos.subdomain   as subdomain',
            'sindicatos.banner      as banner',
            'sindicatos.logo        as logo',
            'sindicatos.fone        as fone',
            'sindicatos.fone2       as fone2',
            'sindicatos.email       as email',
            'sindicatos.facebook    as facebook',
            'sindicatos.twitter     as twitter',
            'sindicatos.instagram   as instagram',
            'sindicatos.whatsapp    as whatsapp',
            'sindicatos.podcast     as podcast',
            'sindicatos.youtube     as youtube',
            'sindicatos.cep         as cep',
            'sindicatos.endereco    as endereco',
            'sindicatos.numero      as numero',
            'sindicatos.complemento as complemento',
            'sindicatos.bairro      as bairro',
            'sindicatos.cidade      as cidade',
            'sindicatos.uf          as uf',
            'sindicatos.deleted_at  as deleted_at',
            'sindicatos.created_at  as created_at',
            'sindicatos.updated_at  as updated_at',

            'banner.id              as banner_id',
            'banner.category        as banner_category',
            'banner.pathfile        as banner_pathfile',
            'banner.name            as banner_name',
            'banner.namefile        as banner_namefile',
            'banner.creditfile      as banner_creditfile',
            'banner.namefilefull    as banner_namefilefull',
            'banner.mimetype        as banner_mimetype',
            'banner.extension       as banner_extension',
            'banner.size            as banner_size',
            'banner.type            as banner_type',
            'banner.description     as banner_description',
            'banner.alternativeText as banner_alternativeText',
            'banner.deleted_at      as banner_deleted_at',
            'banner.created_at      as banner_created_at',
            'banner.updated_at      as banner_updated_at',
            
            'logo.id                as logo_id',
            'logo.category          as logo_category',
            'logo.pathfile          as logo_pathfile',
            'logo.name              as logo_name',
            'logo.namefile          as logo_namefile',
            'logo.creditfile        as logo_creditfile',
            'logo.namefilefull      as logo_namefilefull',
            'logo.mimetype          as logo_mimetype',
            'logo.extension         as logo_extension',
            'logo.size              as logo_size',
            'logo.type              as logo_type',
            'logo.description       as logo_description',
            'logo.alternativeText   as logo_alternativeText',
            'logo.deleted_at        as logo_deleted_at',
            'logo.created_at        as logo_created_at',
            'logo.updated_at        as logo_updated_at'
        )->first();

        return $listAll;
    }

    /**
     * site 
     */
    // public function listAllToSitePagesindicatos()
    // {
    //     $list = DB::table('sindicatos');
    //     $list->leftjoin('files as file', 'file.id', '=', 'sindicatos.banner');
    //     $list->whereNull('sindicatos.deleted_at');
                          
    //     $list->orderBy('sindicatos.created_at', 'desc');

    //     $listAll = $list->addSelect(
    //         'sindicatos.id as id',
    //         'sindicatos.name as name',
            
    //         'file.id as file_id',
    //         'file.category as file_category',
    //         'file.pathfile as file_pathfile',
    //         'file.name as file_name',
    //         'file.namefile as file_namefile',
    //         'file.creditfile as file_creditfile',
    //         'file.namefilefull as file_namefilefull',
    //         'file.mimetype as file_mimetype',
    //         'file.extension as file_extension',
    //         'file.size as file_size',
    //         'file.type as file_type',
    //         'file.description as file_description',
    //         'file.alternativeText as file_alternativeText',
    //         'file.created_at as file_created_at',
    //         'file.updated_at as file_updated_at'
    //         );
    //     return $listAll;
    // }

    public function returnSindicatoVigente()
    {
        $list = DB::table('sindicatos');
        $list->leftjoin('files as banner', 'banner.id', '=', 'sindicatos.banner');
        $list->leftjoin('files as logo', 'logo.id', '=', 'sindicatos.logo');
        $list->whereNull('sindicatos.deleted_at');
                          
        $list->orderBy('sindicatos.dataLimite', 'desc');
        $list->where('sindicatos.dataLimite', '>=', Carbon::now());

        $listAll = $list->addSelect(
            'sindicatos.id          as id',
            'sindicatos.ativo       as ativo',
            'sindicatos.name        as name',
            'sindicatos.subdomain   as subdomain',
            'sindicatos.banner      as banner',
            'sindicatos.logo        as logo',
            'sindicatos.fone        as fone',
            'sindicatos.fone2       as fone2',
            'sindicatos.email       as email',
            'sindicatos.facebook    as facebook',
            'sindicatos.twitter     as twitter',
            'sindicatos.instagram   as instagram',
            'sindicatos.whatsapp    as whatsapp',
            'sindicatos.podcast     as podcast',
            'sindicatos.youtube     as youtube',
            'sindicatos.cep         as cep',
            'sindicatos.endereco    as endereco',
            'sindicatos.numero      as numero',
            'sindicatos.complemento as complemento',
            'sindicatos.bairro      as bairro',
            'sindicatos.cidade      as cidade',
            'sindicatos.uf          as uf',
            'sindicatos.deleted_at  as deleted_at',
            'sindicatos.created_at  as created_at',
            'sindicatos.updated_at  as updated_at',

            'banner.id              as banner_id',
            'banner.category        as banner_category',
            'banner.pathfile        as banner_pathfile',
            'banner.name            as banner_name',
            'banner.namefile        as banner_namefile',
            'banner.creditfile      as banner_creditfile',
            'banner.namefilefull    as banner_namefilefull',
            'banner.mimetype        as banner_mimetype',
            'banner.extension       as banner_extension',
            'banner.size            as banner_size',
            'banner.type            as banner_type',
            'banner.description     as banner_description',
            'banner.alternativeText as banner_alternativeText',
            'banner.created_at      as banner_created_at',
            'banner.updated_at      as banner_updated_at',
            
            'logo.id                as logo_id',
            'logo.category          as logo_category',
            'logo.pathfile          as logo_pathfile',
            'logo.name              as logo_name',
            'logo.namefile          as logo_namefile',
            'logo.creditfile        as logo_creditfile',
            'logo.namefilefull      as logo_namefilefull',
            'logo.mimetype          as logo_mimetype',
            'logo.extension         as logo_extension',
            'logo.size              as logo_size',
            'logo.type              as logo_type',
            'logo.description       as logo_description',
            'logo.alternativeText   as logo_alternativeText',
            'logo.created_at        as logo_created_at',
            'logo.updated_at        as logo_updated_at'
            );
        return $listAll->first();
    }
}
