<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Edital;
use App\Services\Upload;
use App\Models\File;
use App\Models\Sindicato;
use App\Models\EditalHasSindicato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use function GuzzleHttp\json_decode;

class EditalController extends Controller
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
        $return = [];
        $Edital = new Edital();
        $entity = session()->get('configAdm')['entity'];
        

        $return['list'] = $Edital->listAllToAdmPageEditais($entity)->get()->toJson();

        return view('adm.editais.editais')->withReturn($return);
    }

    public function cadastro(Request $request)
    {
        $sindicatos = new Sindicato();

        return view('adm.editais.editais-cadastrar')->withSindicatos($sindicatos->all()->toArray());
    }

    public function edicao(Request $request, $id = '')
    {
        $sindicatos = new Sindicato();
        
        if( (int) $id == 0 ) {
            return redirect('/adm/editais');
        }
        
        $Edital = new Edital();
        $Edital = $Edital->findById($id);
        
        return view('adm.editais.editais-editar')->withList(json_encode($Edital))
                                                 ->withSindicatos($sindicatos->all()->toArray());
    }

    public function cadastrar(Request $request)
    {
        $entity = session()->get('configAdm')['entity'];

        $Edital = new Edital();
        $Edital->ativo = $request->input('ativar') == 'true' ? 'S' : 'N';
        $Edital->sindicatoAutor = $entity ? $entity : null;
        $Edital->dataInclusao = $request->input('dataInclusao') ? Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;
        $Edital->dataLimiteNoDestaque = $request->input('dataLimiteNoDestaque') ? Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimiteNoDestaque')} {$request->input('horaLimiteNoDestaque')}") : null;
        $Edital->horaLimiteNoDestaque = $request->input('horaLimiteNoDestaque') ? Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque')) : null;
        $Edital->ativarNosSindicatos = $request->input('idsSindicatos') ?? null;
        $Edital->cartola = $request->input('cartola') ?? '';
        $Edital->tags = $request->input('tags') ?? '';
        $Edital->titulo = $request->input('titulo') ?? '';
        $Edital->linhaDeApoio = $request->input('linhaDeApoio') ?? '';
        $Edital->userIdCreated = Auth::id();
        $Edital->save();


        $sindicatos = $request->input('idsSindicatos');
    
        if ($sindicatos)
        {            
            $sindicatos = explode(',', $sindicatos);

            foreach ( $sindicatos as $item )
            {
                $editalHasSindicato = new EditalHasSindicato();
                $editalHasSindicato->edital = $Edital->id;
                $editalHasSindicato->sindicato = $item;

                $editalHasSindicato->save();
            }
        }

        
        $file = new Upload();
        $file->path = 'files/editais';
        $file->creditfile = $request->input('creditoBannerDestaque') ?? null;
        $fileBannerDestaqueStored = $file->addFile( $request->file('bannerDestaque') );
        
        if ( count($fileBannerDestaqueStored) > 0 ) {
            $Edital->bannerDestaque = $fileBannerDestaqueStored['FileId'];
            $Edital->save();
        }
        
        $file = new Upload();
        $file->path = 'files/editais';
        $fileStored = $file->addFile( $request->file('file') );

        if ( count($fileStored) > 0 ) {
            $Edital->file = $fileStored['FileId'];
            $Edital->save();
        }

        return redirect(url('adm/editais'));
    }

    public function editar(Request $request)
    {
        //dd( $request );
        $Edital = new Edital();
        $Edital = $Edital->find($request->input('id'));
        
        $Edital->ativo = $request->input('ativar') == 'true' ? 'S' : 'N';
        $Edital->dataInclusao = $request->input('dataInclusao') ? Carbon::createFromFormat('Y-m-d', $request->input('dataInclusao')) : null;
        $Edital->dataLimiteNoDestaque = $request->input('dataLimiteNoDestaque') ? Carbon::createFromFormat('Y-m-d H:i', "{$request->input('dataLimiteNoDestaque')} {$request->input('horaLimiteNoDestaque')}") : null;
        $Edital->horaLimiteNoDestaque = $request->input('horaLimiteNoDestaque') ? Carbon::createFromFormat('H:i', $request->input('horaLimiteNoDestaque')) : null;
        $Edital->ativarNosSindicatos = $request->input('idsSindicatos') ?? null;
        $Edital->cartola = $request->input('cartola') ?? '';
        $Edital->tags = $request->input('tags') ?? '';
        $Edital->titulo = $request->input('titulo') ?? '';
        $Edital->linhaDeApoio = $request->input('linhaDeApoio') ?? '';
        $Edital->userIdUpdated = Auth::id();
        $Edital->save();
        

        /**
         * Update Sindicatos
         */
        $sindicatos = $request->input('idsSindicatos');
        // Obtem os ids cadastrados para comparar com os novos
        $getOldIdsSindicatos = new EditalHasSindicato();
        $resultOldIdsSindicatos = $getOldIdsSindicatos->where('edital', '=', $request->input('id'));
        $oldIdsSindicatos = $resultOldIdsSindicatos->get()->toArray();
       
        // converte array in string
        if ( count($oldIdsSindicatos) )
        {
            $auxOldIdsSindicatos = $oldIdsSindicatos;
            $oldIdsSindicatos = [];

            foreach ($auxOldIdsSindicatos as $item) {
                $oldIdsSindicatos[] = $item['sindicato'];
            }

            $oldIdsSindicatos = implode(",", $oldIdsSindicatos);
        }
        else
        {
            $oldIdsSindicatos = '';
        }
 
        // Atualiza os sindicatos se as strings for diferentes, ou seja se houve alteração
        if ($sindicatos != $oldIdsSindicatos)
        {
            $sindicatosArray = explode(',', $sindicatos);

            // se existir algo registrado deleta
            if ( strlen($oldIdsSindicatos) ) {
                $resultOldIdsSindicatos->delete();
            }

            // Inseri os novos registros
            if ($sindicatos) {
                foreach ( $sindicatosArray as $item )
                {
                    $editalHasSindicato = new EditalHasSindicato();
                    $editalHasSindicato->edital = $Edital->id;
                    $editalHasSindicato->sindicato = $item;
    
                    $editalHasSindicato->save();
                }
            }
        }


        $creditoBannerDestaque = new File();
        $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $Edital->bannerDestaque )->first();

        $creditoBannerDestaque = new File();
        if ( $request->file('bannerDestaque') )
        {
            $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $Edital->bannerDestaque )->first();

            if ($creditoBannerDestaque) {
                $creditoBannerDestaque->delete();
            }

            $file = new Upload();
            $file->path = 'files/editais';
            $file->creditfile = $request->input('creditoBannerDestaque') ?? null;
            $fileBannerDestaqueStored = $file->addFile( $request->file('bannerDestaque') );
            
            if ( count($fileBannerDestaqueStored) > 0 ) {
                $Edital->bannerDestaque = $fileBannerDestaqueStored['FileId'];
                $Edital->save();
            }
        }
        else
        {
            $creditoBannerDestaque = $creditoBannerDestaque->where( 'id', $Edital->bannerDestaque )->first();

            if ($creditoBannerDestaque) {
                $creditoBannerDestaque->creditfile = $request->input('creditoBannerDestaque') ?? null;
                $creditoBannerDestaque->save();
            }   
        }


        if ( $request->file('file') )
        {
            $file = new File();
            $file = $file->where( 'id', $Edital->file )->first();
            $file->delete();

            $file = new Upload();
            $file->path = 'files/editais';
            $fileStored = $file->addFile( $request->file('file') );
            
            if ( count($fileStored) > 0 ) {
                $Edital->file = $fileStored['FileId'];
                $Edital->save();
            }
        }
    
        return redirect(url('adm/editais'));
    }

    public function deletar(Request $request)
    {
        $Edital = new Edital();
        $delete = $Edital->find($request->input('id'));
        $delete->delete();
        return redirect(url('adm/editais'));
    }
}
