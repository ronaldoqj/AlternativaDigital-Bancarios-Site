<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Portal;
use App\Models\Contato;
use App\Models\Instituicao;

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
        
        $portal = $entity->find(1);
        $fetrafirs = $entity->find(2);
        $contato = $contatos->where('fetrafi', 'RS')->first();
        $fetrafirs->textContato = $contato->texto;
        $instituicao = $instituicoes->where('fetrafi', 'RS')->first();
        $fetrafirs->textInstitucional = $instituicao->texto;

        $request->portal = $portal;
        $request->fetrafirs = $fetrafirs;
        
        return $next($request);
    }
}
