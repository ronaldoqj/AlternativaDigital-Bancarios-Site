<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Portal;
use App\Models\Contato;
use App\Models\Instituicao;
use App\Models\Banco;

class GetEntitiesForTemplate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $entity = new Portal();
        $contatos = new Contato();
        $instituicoes = new Instituicao();
        $banco = new Banco();
        
        $banco = $banco->all();
        $portal = $entity->find(1);
        $fetrafirs = $entity->find(2);
        $contato = $contatos->where('fetrafi', 'RS')->first();
        $fetrafirs->textContato = $contato->texto;
        $instituicao = $instituicoes->where('fetrafi', 'RS')->first();
        $fetrafirs->textInstitucional = $instituicao->texto;

        $request->portal = $portal;
        $request->fetrafirs = $fetrafirs;
        $request->bancos = $banco;
        
        return $next($request);
    }
}
