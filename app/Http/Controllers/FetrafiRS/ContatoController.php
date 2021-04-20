<?php

namespace App\Http\Controllers\FetrafiRS;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

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
        $msgEnvio = '';
        if ( $request->isMethod('post') )
        {
            if ($this->sendMail($request)) {
                $msgEnvio = 'Mensagem enviada com sucesso';
            }
        }

        return view('fetrafi-rs.contato')->withMsgEnvio($msgEnvio);
    }

    private function sendMail(Request $request): bool
    {
        $bannerPath = $request->fetrafirs->dataBanner['pathfile'] .'/'. request()->fetrafirs->dataBanner['namefile'];
        $logoPath = $request->fetrafirs->dataLogo['pathfile'] .'/'. request()->fetrafirs->dataLogo['namefile'];

        $request->request->add(['bannerPathFull' => asset($bannerPath)]);
        $request->request->add(['logoPathFull' => asset($logoPath)]);

        $this->mailSend = $request->fetrafirs['email'];
        $this->mailFrom = $request->input('email');
        $this->nomeSend = $request->input('nome');
        $user = '';

        Mail::send('emails.fetrafi-rs.contato', ['parameters' => $request], function($m) use ($user) {
            $m->from($this->mailFrom, 'Portal dos Bancários | Formulário de Contato, '. $this->nomeSend);
            $m->cc(env('MAIL_BLIND_CARBON_COPY'));
            $m->to($this->mailSend, $this->nomeSend)->subject($this->nomeSend);
        });

        return true;
    }
}
