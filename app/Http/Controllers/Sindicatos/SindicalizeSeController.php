<?php

namespace App\Http\Controllers\Sindicatos;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Estado;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class SindicalizeSeController extends Controller
{
    private string $mailSend;
    private string $mailFrom;
    private string $nomeSend;
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
        $estados = new Estado();
        $msgEnvio = '';

        if ( $request->isMethod('post') ) {
            if ($this->sendMail($request)) {
                $msgEnvio = 'Inscrição enviada com sucesso';
            }
        }

        return view('sindicatos.sindicalize-se')->withEstados( $estados->orderBy('estado')->get() )->withMsgEnvio($msgEnvio);
    }

    private function sendMail(Request $request): bool {

        if ($request->syndicate['email'])
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
            $this->mailFrom = $request->input('inputEmail');
            $this->nomeSend = $request->input('inputNome');
    
            // $user = User::findOrFail(auth()->id());
            $user = '';
    
            Mail::send('emails.sindicatos.sindicalize-se', ['user' => $user, 'parameters' => $request], function($m) use ($user) {
                $m->from($this->mailFrom, 'Portal dos Bancários | Formulário sindicalize-se, '. $this->nomeSend);
                $m->cc(env('MAIL_BLIND_CARBON_COPY'));
                $m->to($this->mailSend, $this->nomeSend)->subject($this->nomeSend);
            });
        }

        return true;
    }

}
