<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Portal;
use App\Models\Contato;
use App\Models\Instituicao;
use App\Models\Banco;
use App\Models\File;
use PhpParser\Node\Expr\Cast\Object_;

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
        $fetrafirs->textContato = $contato->texto ?? null;
        $instituicao = $instituicoes->where('fetrafi', 'RS')->first();
        $fetrafirs->textInstitucional = $instituicao->texto ?? null;

        $request->portal = $portal;
        $request->fetrafirs = $fetrafirs;
        $request->bancos = $banco;

        $file = new File();

        if ($request->portal->logo)
        {    
            $file = $file->find($request->portal->logo);
            if ($file) {
                $request->portal->dataLogo = $file->toArray();
            }
        }

        if ($request->fetrafirs->banner)
        {
            $file = $file->find($request->fetrafirs->banner);
            if ($file) {
                $request->fetrafirs->dataBanner = $file->toArray();
            }
        }

        if ($request->fetrafirs->logo)
        {
            $file = $file->find($request->fetrafirs->logo);
            if ($file) {
                $request->fetrafirs->dataLogo = $file->toArray();
            }
        }

        $request = $this->checkAndInjectBancoParameter($request);  
        return $next($request);
    }

    /**
     * Tratamento para resolver o problema de produção
     * na obtenção do parametro GET "?banco=[id]".
     * Em produção é adicionado o caracter "/" antes dos
     * parametros GET, somente nos subdominios. Exemplo:
     * "/?banco=2", e essa barra faz com que o Laravel não
     * consiga reconhecer o parametro GET
     */
    private function checkAndInjectBancoParameter($request): Object
    {
        $banco = $request->input('banco');
        
        if ( ! $banco )
        {
            $url = $_SERVER['REQUEST_URI'];
            $paramBanco = explode('?banco=', $url);

            if ( count($paramBanco) > 1 )
            {
                if ( (int) $paramBanco[1] )
                {
                    $request->request->add(['banco' => $banco]);
                    $request->attributes->banco = $banco;
                }
            }
        }

        return $request;
    }
}
