<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Campanha extends Model
{
    use SoftDeletes;

    /**
     * Adm 
     */
    public function listAllToAdmPageCampanhas()
    {
        $list = DB::table('campanhas');
        $list->leftjoin('files as file', 'file.id', '=', 'campanhas.file');
        $list->whereNull('campanhas.deleted_at');
                          
        $list->orderBy('campanhas.created_at', 'desc');

        $listAll = $list->addSelect(
            'campanhas.id as id',
            'campanhas.name as name',
            'campanhas.link as link',
            'campanhas.dataInclusao as dataInclusao',
            'campanhas.dataLimite as dataLimite',
            'campanhas.horaLimite as horaLimite',
            
            'file.id as file_id',
            'file.category as file_category',
            'file.pathfile as file_pathfile',
            'file.name as file_name',
            'file.namefile as file_namefile',
            'file.creditfile as file_creditfile',
            'file.namefilefull as file_namefilefull',
            'file.mimetype as file_mimetype',
            'file.extension as file_extension',
            'file.size as file_size',
            'file.type as file_type',
            'file.description as file_description',
            'file.alternativeText as file_alternativeText',
            'file.created_at as file_created_at',
            'file.updated_at as file_updated_at'
        );
        return $listAll;
    }


    /**
     * Comum a todos
     */
    public function findById($id)
    {
        $list = DB::table('campanhas');
        $list->leftjoin('files as file', 'file.id', '=', 'campanhas.file');
        $list->where('campanhas.id', $id);
        
        $listAll = $list->addSelect(
            'campanhas.id as id',
            'campanhas.name as name',
            'campanhas.link as link',
            'campanhas.dataInclusao as dataInclusao',
            'campanhas.dataLimite as dataLimite',
            'campanhas.horaLimite as horaLimite',
            
            'file.id as file_id',
            'file.category as file_category',
            'file.pathfile as file_pathfile',
            'file.name as file_name',
            'file.namefile as file_namefile',
            'file.creditfile as file_creditfile',
            'file.namefilefull as file_namefilefull',
            'file.mimetype as file_mimetype',
            'file.extension as file_extension',
            'file.size as file_size',
            'file.type as file_type',
            'file.description as file_description',
            'file.alternativeText as file_alternativeText',
            'file.created_at as file_created_at',
            'file.updated_at as file_updated_at'
        )->first();
        return $listAll;
    }

    /**
     * site 
     */
    // public function listAllToSitePageCampanhas()
    // {
    //     $list = DB::table('campanhas');
    //     $list->leftjoin('files as file', 'file.id', '=', 'campanhas.file');
    //     $list->whereNull('campanhas.deleted_at');
                          
    //     $list->orderBy('campanhas.created_at', 'desc');

    //     $listAll = $list->addSelect(
    //         'campanhas.id as id',
    //         'campanhas.name as name',
    //         'campanhas.link as link',
    //         'campanhas.dataInclusao as dataInclusao',
    //         'campanhas.dataLimite as dataLimite',
    //         'campanhas.horaLimite as horaLimite',
            
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

    public function returnCampanhaVigente()
    {
        $list = DB::table('campanhas');
        $list->leftjoin('files as file', 'file.id', '=', 'campanhas.file');
        $list->whereNull('campanhas.deleted_at');
                          
        $list->orderBy('campanhas.dataLimite', 'desc');
        $list->where('campanhas.dataLimite', '>=', Carbon::now());

        $listAll = $list->addSelect(
            'campanhas.id as id',
            'campanhas.name as name',
            'campanhas.link as link',
            'campanhas.dataInclusao as dataInclusao',
            'campanhas.dataLimite as dataLimite',
            'campanhas.horaLimite as horaLimite',
            
            'file.id as file_id',
            'file.category as file_category',
            'file.pathfile as file_pathfile',
            'file.name as file_name',
            'file.namefile as file_namefile',
            'file.creditfile as file_creditfile',
            'file.namefilefull as file_namefilefull',
            'file.mimetype as file_mimetype',
            'file.extension as file_extension',
            'file.size as file_size',
            'file.type as file_type',
            'file.description as file_description',
            'file.alternativeText as file_alternativeText',
            'file.created_at as file_created_at',
            'file.updated_at as file_updated_at'
            );
        return $listAll->first();
    }
}
