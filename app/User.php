<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\PermissionAssigned;
use App\Models\File;

class User extends Authenticatable
{
    use Notifiable;
    const PERFIL_MASTER = 'master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listUsers() {

        $list = DB::table('users');
        $list->leftjoin('files as image', 'image.id', '=', 'users.image');

        if (auth()->user()->perfil != self::PERFIL_MASTER) {
            $list->where('perfil', '<>', self::PERFIL_MASTER);
        }

        $list->orderBy('users.name', 'desc');

        $listAll = $list->addSelect('users.id as id',
                                    'users.perfil as perfil',
                                    'users.name as name',
                                    'users.email as email',
                                    'users.image as image',
                                    'users.phone as phone',
                                    'users.company as company',
                                    'users.position as position',

                                    //Tabela Files
                                    'image.id as image_id',
                                    'image.category as image_category',
                                    'image.pathfile as image_pathfile',
                                    'image.name as image_name',
                                    'image.namefile as image_namefile',
                                    'image.creditfile as image_creditfile',
                                    'image.namefilefull as image_namefilefull',
                                    'image.mimetype as image_mimetype',
                                    'image.extension as image_extension',
                                    'image.size as image_size',
                                    'image.type as image_type',
                                    'image.description as image_description',
                                    'image.alternativeText as image_alternativeText',
                                    'image.created_at as image_created_at',
                                    'image.updated_at as image_updated_at');
        return $listAll;

    }
    
    public function findById(int $id) {

        $list = DB::table('users');
        $list->leftjoin('files as image', 'image.id', '=', 'users.image');

        if ( (int)session()->get('configAdm')['entity'] ) {
            //$list->where('users.entidade', (int)session()->get('configAdm')['entity']);
        }

        $list->orderBy('users.name', 'desc');
        $list->where('users.id', $id);

        $listAll = $list->addSelect('users.id as id',
                                    'users.perfil as perfil',
                                    'users.name as name',
                                    'users.email as email',
                                    'users.image as image',
                                    'users.phone as phone',
                                    'users.company as company',
                                    'users.position as position',

                                    //Tabela Files
                                    'image.id as image_id',
                                    'image.category as image_category',
                                    'image.pathfile as image_pathfile',
                                    'image.name as image_name',
                                    'image.namefile as image_namefile',
                                    'image.creditfile as image_creditfile',
                                    'image.namefilefull as image_namefilefull',
                                    'image.mimetype as image_mimetype',
                                    'image.extension as image_extension',
                                    'image.size as image_size',
                                    'image.type as image_type',
                                    'image.description as image_description',
                                    'image.alternativeText as image_alternativeText',
                                    'image.created_at as image_created_at',
                                    'image.updated_at as image_updated_at');
        return $listAll;
    }

    public function getPermissionsById(int $id): Array
    {
        $namesPermissions = new Permission();
        $permissionAssigned = new PermissionAssigned();

        /**
         * Trata as permissões do Portal
         */
        $listPermissions['adm'] = $permissionAssigned->where('user_id', $id)
                                              ->where('entity', 'adm')
                                              ->get()
                                              ->toArray();

        $listPermissions['portal'] = $permissionAssigned->where('user_id', $id)
                                              ->where('entity', 'portal')
                                              ->get()
                                              ->toArray();
        /**
         * Trata as permissões da Fetrafi-rs
         */
        $listPermissions['fetrafiRs'] = $permissionAssigned->where('user_id', $id)
                                              ->where('entity', 'fetrafi-rs')
                                              ->get()
                                              ->toArray();
        /**
         * Trata as permissões dos sindicatos
         */
        $listPermissions['syndicates'] = [];
        $collectionPermissionsSyndicate = $permissionAssigned->where('user_id', $id)
                                                             ->where('entity', 'syndicate')
                                                             ->orderBy('syndicate_id', 'asc');
                                                             
        $idsSyndicates = $collectionPermissionsSyndicate->get()->groupBy('syndicate_id');
        
        foreach ($idsSyndicates->toArray() as $key => $value)
        {
            $listPermissions['syndicates'][$key] = $permissionAssigned->where('user_id', $id)
                                                                      ->where('entity', 'syndicate')
                                                                      ->where('syndicate_id', $key)
                                                                      ->orderBy('permission_id', 'asc')
                                                                      ->get()
                                                                      ->toArray();
        }

        $permissions['assigned'] = $listPermissions;
        $permissions['names'] = $namesPermissions->select('id', 'entity', 'name', 'var_name', 'description')->get()->toArray();

        return $permissions;
    }

    public function getMoreUserDetailsById(int $id): Array
    {
        $image = new File();
        $image = $image->find($id);
        
        if ($image) {
            $image = $image->find($id)->toArray() ?? [];
        } else {
            $image = [];
        }

        return $image;
    }
}
