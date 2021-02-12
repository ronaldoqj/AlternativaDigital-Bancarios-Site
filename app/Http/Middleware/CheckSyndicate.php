<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Sindicato;
use App\Models\File;
use Illuminate\Support\Str;

class CheckSyndicate
{
    const REPLACED_STRINGS = [ 'http://', 'https://', 'www', '.' ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('sindicato'))
        {
            session()->forget('sindicato');
        }

        $subdomain = $this->getSubDomain();
        
        if ($subdomain)
        {
            $sindicato = new Sindicato();
            $sindicato = $sindicato->whereNotNull('subdomain')->get();
            
            $arraySubdomains = [];

            if ( $sindicato->count() ) {
                foreach($sindicato as $item) {
                    $arraySubdomains[] = $item->subdomain;
                }
            }

            $keyArraySearch = array_search($subdomain, $arraySubdomains);

            if ( is_numeric($keyArraySearch) )
            {
                $banner = new File();
                $banner = $banner->find($sindicato[$keyArraySearch]->getAttributes()['banner']);
                $logo = new File();
                $logo = $logo->find($sindicato[$keyArraySearch]->getAttributes()['logo']);

                $sessionSindicato = $sindicato[$keyArraySearch]->getAttributes();
                $sessionSindicato['banner_file'] = $banner->toArray();
                $sessionSindicato['logo_file'] = $logo->toArray();
                session(['sindicato' => $sessionSindicato]);
            }
        }

        return $next($request);
    }

    
    private function getSubDomain(): String
    {
        /**
         * Seta as variaveis com valores do dominio atual
         */
        $url = $this->removeBar( strtolower( url()->current() ) );
        
        $domain = $this->removeBar( strtolower( env('APP_URL_DOMAIN') ) );
        $environment = env('APP_ENV') ?? '';
        $subdomain = '';
        if ( strtolower($environment) === 'local' && env('APP_URL_SIMULATION') != '' )
        {
            $subdomain = $this->removeBar( strtolower(env('APP_URL_SIMULATION')) );
        }
        else
        {
            /**
             * Valida se existe uma variável no .env com o dominio
             * atual em uso do projeto no servidor.
             */
            if ( strlen($domain) ) {
                
                $subdomain = explode($domain, $url)[0];
                $subdomain = str_replace( self::REPLACED_STRINGS, '', $subdomain );
            }
        }

        return $subdomain;
    }

    private function removeBar(string $string): string
    {
        if (Str::of($string)->endsWith('/') ) {
            $string = Str::replaceLast('/', '', $string);
        }

        return $string;
    }
}
