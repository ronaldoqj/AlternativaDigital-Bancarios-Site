<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\Estado;
use App\Models\CategoriaConvenio;
use App\Models\Convenio;
use Illuminate\Support\Facades\Auth;

class ServicoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckPermission:servicos');
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

        $estados = new Estado();

        /**
         * Categorias Convenios
         * 
         * Alimenta o combobox das categorias dos convenios
         */
        $categoriasConvenios = new CategoriaConvenio();
        $categoriasConvenios = $categoriasConvenios->listAllToAdm()->get()->toJson();

        /**
         * Listagem dos convenios organizados por categoria
         * dentro de cada categoria contem a listagem dos convenios
         */
        $entity = (int)session()->get('configAdm')['entity'];
        $convenio = new Convenio();
        $getListCategoriasComConvenios = $convenio->getListCategoriasComConvenios($entity);

        return view('adm.servicos')->withItems(json_encode([]))
                                   ->withData($search)
                                   ->withCategoriasConvenios($categoriasConvenios)
                                   ->withListCategoriasComConvenios($getListCategoriasComConvenios)
                                   ->withEstados(json_encode($estados->all()->toArray()));
    }

    public function convenio(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $convenio = new Convenio();

            switch ($request->input('action'))
            {
                case 'create':
                    $convenio->name = $request->input('name');
                    $convenio->email = $request->input('email');
                    $convenio->entidade = $request->input('entity');
                    $convenio->categoria = $request->input('convenio');
                    $convenio->description = $request->input('description');
                    $convenio->site = $request->input('site');
                    $convenio->facebook = $request->input('facebook');
                    $convenio->twitter = $request->input('twitter');
                    $convenio->instagram = $request->input('instagram');
                    $convenio->whatsapp = $request->input('whatsapp');
                    $convenio->cep = $request->input('cep');
                    $convenio->endereco = $request->input('endereco');
                    $convenio->numero = $request->input('numero');
                    $convenio->complemento = $request->input('complemento');
                    $convenio->bairro = $request->input('bairro');
                    $convenio->cidade = $request->input('cidade');
                    $convenio->uf = $request->input('uf');
                    $convenio->save();
                    break;
                
                case 'update':
                    $update = $convenio->find($request->input('id'));
                    //dump($request->input('convenio'));
                    //dd($update);
                    $update->name = $request->input('name');
                    $update->email = $request->input('email');
                    $update->entidade = $request->input('entity');
                    $update->categoria = $request->input('convenio');
                    $update->description = $request->input('description');
                    $update->site = $request->input('site');
                    $update->facebook = $request->input('facebook');
                    $update->twitter = $request->input('twitter');
                    $update->instagram = $request->input('instagram');
                    $update->whatsapp = $request->input('whatsapp');
                    $update->cep = $request->input('cep');
                    $update->endereco = $request->input('endereco');
                    $update->numero = $request->input('numero');
                    $update->complemento = $request->input('complemento');
                    $update->bairro = $request->input('bairro');
                    $update->cidade = $request->input('cidade');
                    $update->uf = $request->input('uf');
                    $update->save();
                    break;
                
                case 'delete':
                    $convenio = $convenio->find($request->input('id'));
                    $convenio->delete();
                    break;
            }
        }

        return redirect()->route('adm-servicos');
    }



    public function edicao(Request $request)
    {
        $type = $this->checkEntity();
        $this->updateInstituicao($type, $request);

        return redirect()->route('adm-servicos');
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
        $select = new Servico();
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
        $saveRegister = new Servico();
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
