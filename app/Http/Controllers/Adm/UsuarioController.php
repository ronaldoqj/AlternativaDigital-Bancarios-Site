<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\_Helpers\Upload;
use App\Models\File;
use App\Models\Sindicato;
use App\Models\Permission;
use App\Models\PermissionAssigned;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\Models\Edital;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Permission $permission)
    {
        $this->middleware('auth');
        $this->middleware('CheckPermission:adm_usuarios');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = new User();

        $return['list'] = $user->listUsers()->get()->toJson();
        $return['permissions'] = $request->session()->get('permissions');

        return view('adm.usuarios.usuarios')->withReturn($return);
    }

    public function cadastro(Request $request)
    {
        $syndicates = new Sindicato();
        $syndicates = $syndicates->all()->toArray();

        $permissions = new Permission();
        $permissions = $permissions->arrayPermissions();

        return view('adm.usuarios.usuarios-cadastrar')->withSyndicates($syndicates)
                                                      ->withPermissions($permissions);
    }

    public function edicao(Request $request, $id = '')
    {
        if ( (int) $id == 0 ) {
            return redirect('/adm/usuarios');
        }

        $syndicates = new Sindicato();
        $syndicates = $syndicates->all()->toArray();

        $permissions = new Permission();
        $permissions = $permissions->arrayPermissions();
        
        $users = new User();
        $user = $users->findById($id)->get()->toArray();
        $permissionAssigned = $users->getPermissionsById($id);

        return view('adm.usuarios.usuario-editar')->withSyndicates($syndicates)
                                                  ->withPermissions($permissions)
                                                  ->withPermissionsAssigned($permissionAssigned)
                                                  ->withUser($user[0] ?? []);
    }

    public function cadastrar(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->company = $request->input('company');
        $user->position = $request->input('position');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $id = $user->id;

        $this->setPermissions($request, $id);

        return redirect(url('adm/usuarios'));
    }

    public function editar(Request $request)
    {
        $id = $request->input('id');
        $user = new User();
        $user = $user->find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->company = $request->input('company');
        $user->position = $request->input('position');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        /**
         * Manipulação do Avatar
         */
        if ($request->file('avatar') || $request->input('deletedImage'))
        {
            $deleteAvatar = new File();
            $deleteAvatar = $deleteAvatar->where( 'id', $user->image )->first();

            if ( $deleteAvatar ) {
                $this->deleteImage($deleteAvatar);
                $user->image = null;
            }
        }

        if ( $request->file('avatar') )
        {
            $file = new Upload();
            $file->path = 'files/usuarios';
            $avatarStored = $file->addFile( $request->file('avatar') );
            
            if ( count($avatarStored) > 0 ) {
                $user->image = $avatarStored['FileId'];
            }
        }

        $user->save();

        if ($request->input('changedPermissions'))
        {
            $this->deletePermissions($id);
            $this->setPermissions($request, $id);
        }

        return redirect()->route('adm-usuarios');
    }


    public function deletar(Request $request)
    {
        $modelUser = new User();
        $user = $modelUser->find($request->input('id'));

        if ($user)
        {
            if ($user->image)
            {
                $file = new File();
                $file = $file->find($user->image);

                if ($file) {
                    $this->deleteImage($file);
                }
            }

            $user->delete();
        }

        return redirect()->route('adm-usuarios');
    }

    private function deleteImage(File $file): bool
    {
        $done = false;
        $pathFile = "{$file->pathfile}/{$file->namefile}";

        if ( is_file($pathFile) )
        {
            if (unlink($pathFile) )
            {
                $file->forceDelete();
                $done = true;
            }
        }

        return $done;
    }


    private function deletePermissions($id)
    {
        $permissions = new PermissionAssigned();
        $permissions = $permissions->where('user_id', $id);

        if ($permissions->count()) {
            $permissions->delete();
        }
    }

    private function setPermissions($request, $id)
    {
        $permissions = json_decode($request->input('permissions'));
        $permissionsAdm = $this->clearArray($permissions->adm ?? []);
        $permissionsPortal = $this->clearArray($permissions->portal ?? []);
        $permissionsFetrafiRs = $this->clearArray($permissions->fetrafiRs ?? []);
        $permissionsSyndicates = $this->clearArray((Array)$permissions->syndicates ?? [], 2);

        foreach($permissionsAdm as $item)
        {
            $permissionAssigned = new PermissionAssigned();
            $permissionAssigned->user_id = $id;
            $permissionAssigned->entity = 'adm';
            $permissionAssigned->permission_id = $item->id;
            $permissionAssigned->save();
        }

        foreach($permissionsPortal as $item)
        {
            $permissionAssigned = new PermissionAssigned();
            $permissionAssigned->user_id = $id;
            $permissionAssigned->entity = 'portal';
            $permissionAssigned->permission_id = $item->id;
            $permissionAssigned->save();
        }

        foreach($permissionsFetrafiRs as $item)
        {
            $permissionAssigned = new PermissionAssigned();
            $permissionAssigned->user_id = $id;
            $permissionAssigned->entity = 'fetrafi-rs';
            $permissionAssigned->permission_id = $item->id;
            $permissionAssigned->save();
        }

        foreach($permissionsSyndicates as $key=>$item)
        {
            foreach($item as $element)
            {
                $permissionAssigned = new PermissionAssigned();
                $permissionAssigned->user_id = $id;
                $permissionAssigned->entity = 'syndicate';
                $permissionAssigned->permission_id = $element->id;
                $permissionAssigned->syndicate_id = $key;
                $permissionAssigned->save();
            }
        }
    }

    /**
     * Method to clear array permissions
     * 
     * @param $array
     * @param $level Informe se o array tem 1 ou 2 niveis. Obs: default 1
     */
    private function clearArray(Array $array, Int $level = 1): Array
    {
        switch ($level) {
            case 1:
                /** Clear array */
                $array = array_filter($array, function($item) { return $item->active; });
                break;
                
            case 2:
                $clearArraySyndicates = [];

                /** Clear sublevel */
                foreach($array as $key=>$item) {
                    $clearArraySyndicates[$key] = array_filter($item, function($element) { return $element->active; });
                }
        
                /** Clear array */
                $array = array_filter($clearArraySyndicates, function($element) { return count($element); });
                break;
        }

        return $array;
    }
}
