<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoriaConvenio extends Model
{
    protected $table = 'categorias_convenios';


    public function listAllToAdm()
    {
        $list = DB::table('categorias_convenios');
        $list->leftjoin('files as icon', 'icon.id', '=', 'categorias_convenios.icon');
        $list->orderBy('categorias_convenios.name', 'asc');
        $listAll = $list->addSelect('categorias_convenios.id as id',
                                    'categorias_convenios.name as name',

                                    'icon.id as file_id',
                                    'icon.category as file_category',
                                    'icon.pathfile as file_pathfile',
                                    'icon.name as file_name',
                                    'icon.namefile as file_namefile',
                                    'icon.creditfile as file_creditfile',
                                    'icon.namefilefull as file_namefilefull',
                                    'icon.mimetype as file_mimetype',
                                    'icon.extension as file_extension',
                                    'icon.size as file_size',
                                    'icon.type as file_type',
                                    'icon.description as file_description',
                                    'icon.alternativeText as file_alternativeText',
                                    'icon.created_at as file_created_at',
                                    'icon.updated_at as file_updated_at');
        return $listAll;
    }
}
