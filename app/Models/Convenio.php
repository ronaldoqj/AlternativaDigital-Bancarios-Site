<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Convenio extends Model
{

    public function getListCategoriasComConvenios($entity)
    {
        /** somente categorias */
        $list = DB::table('convenios');
        $list->where('convenios.entidade', $entity);
        $list->groupBy('convenios.categoria');
        $list->orderBy('convenios.categoria', 'asc');
        $newList = [];

        $distinctCategories = $list->addSelect('convenios.categoria as categoria')->get();

        if ( $distinctCategories->count() )
        {
            foreach ($distinctCategories as $item)
            {
                $newList[] = $item->categoria;
            }

            $distinctCategories = $newList;
        }


        /** retorna somente as categorias encontradas anteriormente */
        $list = DB::table('categorias_convenios');
        $list->leftjoin('files as icon', 'icon.id', '=', 'categorias_convenios.icon');
        $list->whereIn('categorias_convenios.id', $distinctCategories);
        $list->orderBy('categorias_convenios.id', 'asc');

        $categorias = $list->addSelect( 'categorias_convenios.id as id',
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
                                        'icon.updated_at as file_updated_at')
                           ->get();
        

        /** incherta os convenios nas categorias */
        foreach ($categorias as $categoria)
        {
            $categoria->convenios = $this->getListConvenios($categoria->id)->get()->toArray();
        }

        return $categorias;

    }

    public function getGroupCategorias()
    {
        $list = DB::table('convenios');
        $list->where('convenios.entidade', (int)session()->get('configAdm')['entity']);
        $list->groupBy('convenios.categoria');
        $list->orderBy('convenios.categoria', 'asc');

        $listAll = $list->addSelect('convenios.categoria as categoria');
        return $listAll;
    }

    public function getListConvenios($category = null)
    {
        $list = DB::table('convenios');
        $list->where('convenios.entidade', (int)session()->get('configAdm')['entity']);

        /** Usado no momento somente pelo método desta classe: getListCategorias */
        if ( $category ) {
            $list->where('convenios.categoria', $category);
        }

        $list->orderBy('convenios.name', 'asc');

        $listAll = $list->addSelect('convenios.id as id',
                                    'convenios.name as name',
                                    'convenios.email as email',
                                    'convenios.entidade as entidade',
                                    'convenios.categoria as categoria',
                                    'convenios.description as description',
                                    'convenios.site as site',
                                    'convenios.facebook as facebook',
                                    'convenios.twitter as twitter',
                                    'convenios.instagram as instagram',
                                    'convenios.whatsapp as whatsapp',
                                    'convenios.cep as cep',
                                    'convenios.endereco as endereco',
                                    'convenios.numero as numero',
                                    'convenios.complemento as complemento',
                                    'convenios.bairro as bairro',
                                    'convenios.cidade as cidade',
                                    'convenios.uf as uf',
                                    'convenios.created_at as created_at',
                                    'convenios.updated_at as updated_at');
        return $listAll;

    }

}
