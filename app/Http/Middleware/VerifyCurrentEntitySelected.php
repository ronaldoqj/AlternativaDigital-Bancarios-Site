<?php

namespace App\Http\Middleware;

use Closure;

class VerifyCurrentEntitySelected
{
    /**
     * Handle an incoming request.
     *
     * Verifica se foi selecionada uma entidade pela Página home. Ex:
     *      Portal
     *      sindicato de porto alegre.
     *      sindicato de camaqua. etc...
     * 
     * Se selecionada uma entidade corretamente, essa entidade estará
     * na sessão com o nome da chave de 'configAdm'.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! session()->has('configAdm')) {
            return redirect()->route('adm-home');
        }

        return $next($request);
    }
}
