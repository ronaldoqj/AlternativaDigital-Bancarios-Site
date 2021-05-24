<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function arrayPermissions(): Array
    {
        $permission = new Permission();
        $permissions['adm'] = $permission->select('id', 'name')->where('entity', 'adm')->get()->toArray();
        $permissions['portal'] = $permission->select('id', 'name')->where('entity', 'portal')->get()->toArray();
        $permissions['fetrafiRs'] = $permission->select('id','name')->where('entity', 'fetrafi-rs')->get()->toArray();
        $permissions['syndicates'] = $permission->select('id','name')->where('entity', 'syndicate')->get()->toArray();

        return $permissions;
    }
}
