<?php

namespace App\Http\Controllers\Sindicatos;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = new Contato();
        $msgEnvio = '';

        if ( $request->isMethod('post') )
        {
            if ($this->sendMail($request)) {
                $msgEnvio = 'Mensagem enviada com sucesso';
            }
        }

        return view('sindicatos.contato')->withData( $data->where('entity', $request->syndicate['id'])->first() )->withMsgEnvio($msgEnvio);
    }

    private function sendMail(Request $request): bool
    {
        $banner = new File();
        $banner = $banner->find($request->syndicate['banner']);
        $logo = new File();
        $logo = $logo->find($request->syndicate['logo']);

        $bannerPath = asset("/{$banner->pathfile}/{$banner->namefile}");
        $logoPath = asset("/{$logo->pathfile}/{$logo->namefile}");

        $request->request->add(['bannerPathFull' => $bannerPath]);
        $request->request->add(['logoPathFull' => $logoPath]);
        
        $this->mailSend = $request->syndicate['email'];
        $this->mailFrom = $request->input('email');
        $this->nomeSend = $request->input('nome');

        $user = '';

        Mail::send('emails.sindicatos.contato', ['parameters' => $request], function($m) use ($user) {
            $m->from($this->mailFrom, 'Portal dos Bancários | Formulário de Contato, '. $this->nomeSend);
            $m->to($this->mailSend, $this->nomeSend)->subject($this->nomeSend);
        });

        return true;
    }
}
