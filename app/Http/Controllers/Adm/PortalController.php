<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PortalController extends Controller
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
        $portal = $this->returnPortal();
        return view('adm.portal')->withData($portal);
    }

    public function edicao(Request $request)
    {
        $portal = $this->returnPortal();
        $portal->fone = $request->input('fone') ?? null;
        $portal->fone2 = $request->input('fone2') ?? null;
        $portal->email = $request->input('email') ?? null;
        $portal->facebook = $request->input('facebook') ?? null;
        $portal->twitter = $request->input('twitter') ?? null;
        $portal->instagram = $request->input('instagram') ?? null;
        $portal->whatsapp = $request->input('whatsapp') ?? null;
        $portal->podcast = $request->input('podcast') ?? null;
        $portal->youtube = $request->input('youtube') ?? null;
        $portal->cep = $request->input('cep') ?? null;
        $portal->endereco = $request->input('endereco') ?? null;
        $portal->numero = $request->input('numero') ?? null;
        $portal->complemento = $request->input('complemento') ?? null;
        $portal->bairro = $request->input('bairro') ?? null;
        $portal->cidade = $request->input('cidade') ?? null;
        $portal->uf = $request->input('estado') ?? null;
        
        $portal->userIdUpdated = Auth::id();
        $portal->save();
        
        return redirect()->route('adm-portal');
    }

    private function returnPortal(): Portal {
        $portal = new Portal();
        return $portal->find( $this->returnId() );
    }

    private function returnId(): int {
        return $id = session()->get('configAdm')['fetrafi'] ? 2 : 1;
    }
    
}
