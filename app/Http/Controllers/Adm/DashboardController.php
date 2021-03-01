<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use App\Models\Sindicato;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id = null, $fetrafi = null)
    {
        if (is_numeric($id) || $fetrafi)
        {
            $configAdm = [
                'entity' => $id,
                /**
                 * Bug do laravel
                 * Se for add na sessão a variavel $fetrafi é add lixo da memória.
                 * 
                 * Se for preciso diferenciar a fetrafi por outras UFs terá que ser refeita
                 * toda a logica para isso.
                 * 
                 * Obs: acredito que o problema está na passagem de parametro como null em segundo argumento.
                 */
                'fetrafi' => $fetrafi ? 'RS' : null,
                'data' => []
            ];

            if ($id > 0)
            {
                $sindicate = new Sindicato();
                $sindicate = $sindicate->findById($id);

                // Caso não encontre registro retorna para a home
                if (! $sindicate) {
                    return $this->redirectToHome();
                }

                $configAdm['data'] = (Array) $sindicate;
            }
            
            session(['configAdm' => $configAdm]);
        }
        else
        {
            if ( ! session()->has('configAdm') ) {
                return $this->redirectToHome();
            }
        }

        $sindicates = new Sindicato();
        return view('adm.dashboard')->withSindicates($sindicates->all()->toArray());
    }

    private function redirectToHome() {
        return redirect()->route('adm-home');
    }
}
