<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use stdClass;

class Portal extends Model
{
    
    protected $table = 'portal';

    /**
     * Comum a todos
     */
    public function findById(int $id): stdClass
    {
        $list = DB::table('portal');
        $list->leftjoin('files as banner', 'banner.id', '=', 'portal.banner');
        $list->leftjoin('files as logo', 'logo.id', '=', 'portal.logo');
        $list->where('portal.id', $id);
        
        $listAll = $list->addSelect(
            'portal.id          as id',
            'portal.banner      as banner',
            'portal.logo        as logo',
            'portal.fone        as fone',
            'portal.fone2       as fone2',
            'portal.email       as email',
            'portal.facebook    as facebook',
            'portal.twitter     as twitter',
            'portal.instagram   as instagram',
            'portal.whatsapp    as whatsapp',
            'portal.podcast     as podcast',
            'portal.youtube     as youtube',
            'portal.cep         as cep',
            'portal.endereco    as endereco',
            'portal.numero      as numero',
            'portal.complemento as complemento',
            'portal.bairro      as bairro',
            'portal.cidade      as cidade',
            'portal.uf          as uf',
            'portal.created_at  as created_at',
            'portal.updated_at  as updated_at',

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
     * Adm
     * Page Home
     */
    public function getAll(): array
    {
        $list = DB::table('portal');
        $list->leftjoin('files as banner', 'banner.id', '=', 'portal.banner');
        $list->leftjoin('files as logo', 'logo.id', '=', 'portal.logo');
        $list->orderBy('portal.id', 'ASC');


        $listAll = $list->addSelect(
            'portal.id          as id',
            'portal.banner      as banner',
            'portal.logo        as logo',
            'portal.fone        as fone',
            'portal.fone2       as fone2',
            'portal.email       as email',
            'portal.facebook    as facebook',
            'portal.twitter     as twitter',
            'portal.instagram   as instagram',
            'portal.whatsapp    as whatsapp',
            'portal.podcast     as podcast',
            'portal.youtube     as youtube',
            'portal.cep         as cep',
            'portal.endereco    as endereco',
            'portal.numero      as numero',
            'portal.complemento as complemento',
            'portal.bairro      as bairro',
            'portal.cidade      as cidade',
            'portal.uf          as uf',
            'portal.created_at  as created_at',
            'portal.updated_at  as updated_at',

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
        )->get()->toArray();

        return $listAll;
    }
}
