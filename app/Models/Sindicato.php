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
        $list->leftjoin('files as file', 'file.id', '=', 'sindicatos.file');
        $list->whereNull('sindicatos.deleted_at');
                          
        $list->orderBy('sindicatos.created_at', 'desc');

        $listAll = $list->addSelect(
            'sindicatos.id as id',
            'sindicatos.name as name',
            'sindicatos.link as link',
            'sindicatos.dataInclusao as dataInclusao',
            'sindicatos.dataLimite as dataLimite',
            'sindicatos.horaLimite as horaLimite',
            
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
        $list = DB::table('sindicatos');
        $list->leftjoin('files as file', 'file.id', '=', 'sindicatos.file');
        $list->where('sindicatos.id', $id);
        
        $listAll = $list->addSelect(
            'sindicatos.id as id',
            'sindicatos.name as name',
            'sindicatos.link as link',
            'sindicatos.dataInclusao as dataInclusao',
            'sindicatos.dataLimite as dataLimite',
            'sindicatos.horaLimite as horaLimite',
            
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
    // public function listAllToSitePagesindicatos()
    // {
    //     $list = DB::table('sindicatos');
    //     $list->leftjoin('files as file', 'file.id', '=', 'sindicatos.file');
    //     $list->whereNull('sindicatos.deleted_at');
                          
    //     $list->orderBy('sindicatos.created_at', 'desc');

    //     $listAll = $list->addSelect(
    //         'sindicatos.id as id',
    //         'sindicatos.name as name',
    //         'sindicatos.link as link',
    //         'sindicatos.dataInclusao as dataInclusao',
    //         'sindicatos.dataLimite as dataLimite',
    //         'sindicatos.horaLimite as horaLimite',
            
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
        $list->leftjoin('files as file', 'file.id', '=', 'sindicatos.file');
        $list->whereNull('sindicatos.deleted_at');
                          
        $list->orderBy('sindicatos.dataLimite', 'desc');
        $list->where('sindicatos.dataLimite', '>=', Carbon::now());

        $listAll = $list->addSelect(
            'sindicatos.id as id',
            'sindicatos.name as name',
            'sindicatos.link as link',
            'sindicatos.dataInclusao as dataInclusao',
            'sindicatos.dataLimite as dataLimite',
            'sindicatos.horaLimite as horaLimite',
            
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
