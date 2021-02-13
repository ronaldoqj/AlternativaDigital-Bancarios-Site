<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contato;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
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
    public function index(Request $request)
    {
        $type = $this->checkEntity();
        $search = $this->searchInstituicao($type);

        if (! $search) {
            $search = $this->saveInstituicao($type);
        }

        return view('adm.contatos')->withData($search);
    }

    public function edicao(Request $request)
    {
        $type = $this->checkEntity();
        $this->updateInstituicao($type, $request);

        return redirect()->route('adm-contatos');
    }


    /**
     * Metodos auxiliares
     */
    private function checkEntity()
    {
        $entity = session()->get('configAdm')['entity'];
        $fetrafi = session()->get('configAdm')['fetrafi'] ?? null;
        $type = null;

        if ($entity > 0) {
            $type = 'sindicato';
        } elseif ($fetrafi) {
            $type = 'fetrafi';
        } else {
            $type = 'portal';
        }

        return $type;
    }

    private function searchInstituicao($type)
    {
        $select = new Contato();
        $entity = session()->get('configAdm')['entity'];
        $fetrafi = session()->get('configAdm')['fetrafi'] ?? null;

        switch ($type) {
            case 'sindicato':                    
                $select = $select->where('entity', $entity)->first();
                break;
            case 'fetrafi':
                $select = $select->where('fetrafi', $fetrafi)->first();
                break;
            case 'portal':
                $select = $select->whereNull('entity')->whereNull('fetrafi')->first();
                break;
        }
        
        return $select;
    }

    private function saveInstituicao($type)
    {
        $saveRegister = new Contato();
        $entity = session()->get('configAdm')['entity'];
        $fetrafi = session()->get('configAdm')['fetrafi'] ?? null;
        
        switch ($type) {
            case 'sindicato':                    
                $saveRegister->entity = $entity;
                break;
            case 'fetrafi':
                $saveRegister->fetrafi = $fetrafi;
                break;
            case 'portal':
                // Nenhum parametro adicional
                break;
        }

        $saveRegister->texto = '';
        $saveRegister->userIdCreated = Auth::id();

        return $saveRegister->save();
    }
    
    private function updateInstituicao($type, $request): void
    {
        $entity = session()->get('configAdm')['entity'];
        $fetrafi = session()->get('configAdm')['fetrafi'] ?? null;
        
        $updateRegister = $this->searchInstituicao($type);
        
        /**
         * Atualiza somente se conseguiu encontrar o registro na linha anterior
         */
        if ($updateRegister)
        {
            switch ($type) {
                case 'sindicato':                    
                    $updateRegister->entity = $entity;
                    break;
                case 'fetrafi':
                    $updateRegister->fetrafi = $fetrafi;
                    break;
                case 'portal':
                    // Nenhum parametro adicional
                    break;
            }
    
            $updateRegister->texto = $request->input('texto');
            $updateRegister->userIdCreated = Auth::id();
    
            $updateRegister->save();
        }
    }
}
