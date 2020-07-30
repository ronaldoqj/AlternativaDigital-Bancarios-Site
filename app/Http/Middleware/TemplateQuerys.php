<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Banco;

class TemplateQuerys
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
        $banco = new Banco();
        $bancos = $banco->all();
        session(['bancos'=> $bancos]);
        // dd($banco->all());
        return $next($request);
    }
}
