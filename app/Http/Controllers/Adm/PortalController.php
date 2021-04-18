<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portal;
use App\_Helpers\Upload;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

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
        $portal = new Portal();
        $portal = $portal->findById( $this->returnId() );

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
        

        /**
         * Delete Images
         */

        $file = new File();
        
        /** Delete Banner */
        if ( $request->input('deleteBannerOnEdit') )
        {
            $recordBanner = $file->find( $portal->banner );

            if ( $recordBanner ) {
                $this->deleteImage($recordBanner);
                $portal->banner = null;
                $portal->save();
            }
        }
        
        /** Delete Logo */
        if ( $request->input('deleteLogoOnEdit') )
        {
            $recordLogo = $file->where( 'id', $portal->logo )->first();

            if ( $recordLogo ) {
                $this->deleteImage($recordLogo);
                $portal->logo = null;
                $portal->save();
            }
        }
        
        /** Register Banner */
        if ( $request->file('banner') )
        {
            $file = new Upload();
            $file->path = 'files/portal';
            $file->creditfile = $request->input('creditoBanner') ?? null;
            $fileBannerStored = $file->addFile( $request->file('banner') );
            
            if ( count($fileBannerStored) > 0 ) {
                $portal->banner = $fileBannerStored['FileId'];
                $portal->save();
            }
        }
        
        /** Register Logo */
        if ( $request->file('logo') )
        {
            $file = new Upload();
            $file->path = 'files/portal';
            $file->creditfile = $request->input('creditoLogo') ?? null;
            $fileLogoStored = $file->addFile( $request->file('logo') );
            
            if ( count($fileLogoStored) > 0 ) {
                $portal->logo = $fileLogoStored['FileId'];
                $portal->save();
            }
        }
        
        return redirect()->route('adm-portal');
    }

    private function deleteImage(File $file): bool
    {
        
        $done = false;
        $pathFile = "{$file->pathfile}/{$file->namefile}";

        if ( is_file($pathFile) )
        {
            if (unlink($pathFile) )
            {
                $file->forceDelete();
                $done = true;
            }
        }

        return $done;
    }

    private function returnPortal(): Portal {
        $portal = new Portal();
        return $portal->find( $this->returnId() );
    }

    private function returnId(): int {
        return $id = session()->get('configAdm')['fetrafi'] ? 2 : 1;
    }
    
}
