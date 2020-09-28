<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class EntidadeParceira extends Model
{
    use SoftDeletes;
    protected $table = 'entidades_parceiras';


    /**
     * Adm 
     */
    public function listAllToAdmPageEntidadesParceiras()
    {
        $list = DB::table('entidades_parceiras');
        $list->leftjoin('files as file', 'file.id', '=', 'entidades_parceiras.file');
        $list->whereNull('entidades_parceiras.deleted_at');
                          
        $list->orderBy('entidades_parceiras.created_at', 'desc');

        $listAll = $list->addSelect('entidades_parceiras.id as id',
                                    'entidades_parceiras.name as name',
                                    'entidades_parceiras.link as link',
                                    
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
                                    'file.updated_at as file_updated_at');
        return $listAll;
    }


    /**
     * Comum a todos
     */
    public function findById($id)
    {
        $list = DB::table('entidades_parceiras');
        $list->leftjoin('files as file', 'file.id', '=', 'entidades_parceiras.file');
        $list->where('entidades_parceiras.id', $id);
        
        $listAll = $list->addSelect('entidades_parceiras.id as id',
                                    'entidades_parceiras.name as name',
                                    'entidades_parceiras.link as link',
                                    
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
                                    'file.updated_at as file_updated_at')->first();
        return $listAll;
    }

    /**
     * site 
     */
    public function listAllToSitePageEntidadesParceiras()
    {
        $list = DB::table('entidades_parceiras');
        $list->leftjoin('files as file', 'file.id', '=', 'entidades_parceiras.file');
        $list->whereNull('entidades_parceiras.deleted_at');
                          
        $list->orderBy('entidades_parceiras.created_at', 'desc');

        $listAll = $list->addSelect('entidades_parceiras.id as id',
                                    'entidades_parceiras.name as name',
                                    'entidades_parceiras.link as link',
                                    
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
                                    'file.updated_at as file_updated_at');
        return $listAll;
    }
}
