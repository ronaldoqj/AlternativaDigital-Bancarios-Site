<?php

namespace App\Http\Middleware;

use App\Models\PermissionAssigned;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    private Array $namesPermissions = [];
    private Bool $acessDenied = false;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $varNamePermission)
    {
        //dump(session()->all());
        if (Auth::user()->perfil != 'master')
        {
            $this->namesPermissions = $this->updateIndexsArrayNamePermissions(session()->get('permissions')['names']);
            switch ($varNamePermission)
            {
                /** ADM */
                case 'adm_sindicatos':
                    if (! $this->checkPermissionADM($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;
                
                case 'adm_meuBanco':
                    if (! $this->checkPermissionADM($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;
                
                case 'adm_entidades':
                    if (! $this->checkPermissionADM($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;
                
                case 'adm_entidadesParceiras':
                    if (! $this->checkPermissionADM($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;
                
                case 'adm_usuarios':
                    if (! $this->checkPermissionADM($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;
                    
                case 'adm_categoriasConvenios':
                    if (! $this->checkPermissionADM($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;


                /** Portal */
                case 'portal_campanhas':
                    if (! $this->checkPermissionPortal($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;


                /** Portal, Fetrafi-Rs, Sindicatos */
                case 'noticias':
                    if (! $this->checkPermissionPortalSyndicateFetrafiRs($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;
                
                case 'acordosEConvencoes':
                    if (! $this->checkPermissionPortalSyndicateFetrafiRs($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;
                
                case 'editais':
                    if (! $this->checkPermissionPortalSyndicateFetrafiRs($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;
                
                case 'contato':
                    if (! $this->checkPermissionPortalSyndicateFetrafiRs($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;
    
                case 'servicos':
                    if (! $this->checkPermissionPortalSyndicateFetrafiRs($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;

                case 'dadosDaInstituicao':
                    if (! $this->checkPermissionPortalSyndicateFetrafiRs($varNamePermission)) { return redirect()->route('adm-home'); }
                    break;

                    
                default:
                    # code...
                    break;
            }
        }
        
        return $next($request);
    }


    private function checkPermissionPortalSyndicateFetrafiRs($permission): Bool
    {
        $access = false;
        $configAdm = session()->get('configAdm');
        $entity = $configAdm['entity'];


        if ($configAdm['fetrafi'])
        {
            /** somente fetrafiRS */
            $access = $this->checkPermissionFetrafiRs("fetrafi-rs_{$permission}");
        }
        else if ($configAdm['entity'] == 0)
        {
            /** Somente Portal */
            $access = $this->checkPermissionPortal("portal_{$permission}");
        }
        else
        {
            /** Somente Sindicato */
            
            $syndicate = session()->get('permissions')['assigned']['syndicates'][$entity];
            $access = $this->checkPermissionSyndicate($syndicate, "syndicate_{$permission}");

        }

        return $access;
    }

    private function checkPermissionSyndicate($permissions, $varNamePermission): Bool
    {
        $access = false;

        foreach ($permissions as $value)
        {
            if ( $this->namesPermissions[$value['permission_id']]['var_name']  === $varNamePermission) {
                $access = true;
                break;
            }
        }

        return $access;
    }

    private function checkPermissionADM($varNamePermission): Bool
    {
        $access = false;
        $permissionsAssigned = session()->get('permissions')['assigned']['adm'];

        foreach ($permissionsAssigned as $value)
        {
            if ( $this->namesPermissions[$value['permission_id']]['var_name']  === $varNamePermission) {
                $access = true;
                break;
            }
        }

        return $access;
    }

    private function checkPermissionPortal($varNamePermission): Bool
    {
        $access = false;
        $permissionsAssigned = session()->get('permissions')['assigned']['portal'];

        foreach ($permissionsAssigned as $value)
        {
            if ( $this->namesPermissions[$value['permission_id']]['var_name']  === $varNamePermission) {
                $access = true;
                break;
            }
        }

        return $access;
    }

    private function checkPermissionFetrafiRs($varNamePermission): Bool
    {
        $access = false;
        $permissionsAssigned = session()->get('permissions')['assigned']['fetrafi-rs'];

        foreach ($permissionsAssigned as $value)
        {
            if ( $this->namesPermissions[$value['permission_id']]['var_name']  === $varNamePermission) {
                $access = true;
                break;
            }
        }

        return $access;
    }

    private function updateIndexsArrayNamePermissions(Array $namesPermissions): Array
    {
        $newArray = [];

        foreach ($namesPermissions as $key => $value) {
            $newArray[$value['id']] = $value;
        }

        return $newArray;
    }
}
