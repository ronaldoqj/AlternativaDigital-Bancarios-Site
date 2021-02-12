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
    public function index(Request $request, $id = null)
    {
        
        if (is_numeric($id))
        {
            $configAdm = [
                'entity' => $id,
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
            
            session (['configAdm' => $configAdm]);
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
