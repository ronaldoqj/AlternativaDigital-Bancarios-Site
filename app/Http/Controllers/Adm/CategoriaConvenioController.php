<?php

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoriaConvenio;
use App\Models\File;
use App\_Helpers\Upload;


class CategoriaConvenioController extends Controller
{
    const PATH = 'files/categorias_convenios';
    private CategoriaConvenio $categoriaConvenio;
    private File $file;
    private Upload $upload;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckPermission:adm_categoriasConvenios');

        $this->categoriaConvenio = new CategoriaConvenio();
        $this->file = new File();
        $this->upload = new Upload();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        if ( $request->isMethod('post') )
        {
            switch ($request->input('action')) {
                case 'create':
                    if ( $request->file('icon') && strlen($request->input('name')) > 2 ) {
                        $this->create($request);
                    }
                    break;
                
                case 'update':
                    if ( strlen($request->input('name')) > 2 ) {
                        $this->update($request);
                    }
                    break;
                
                case 'delete':
                    if ( $request->input('id') ) {
                        $this->delete($request);
                    }
                    break;
            }
        }

        $categoriasConvenios = new CategoriaConvenio();
        $categoriasConvenios = $categoriasConvenios->listAllToAdm()->get()->toJson();

        return view('adm.categorias-convenios.categorias-convenios')->withReturn($categoriasConvenios);
    }

    /**
     * Function to create new health insurance category
     * 
     * @param Object $request Object received from form
     */
    private function create(Request $request)
    {
        $this->categoriaConvenio->name = $request->input('name');

        $this->upload->path = self::PATH;
        $fileStored = $this->upload->addFile( $request->file('icon') );
        
        if ( count($fileStored) > 0 )
        {
            $this->categoriaConvenio->icon = $fileStored['FileId'];
            $this->categoriaConvenio->save();
        }

        return redirect()->route('adm-categorias-convenios');
    }
    
    /**
     * Function to update health insurance category
     * 
     * @param Object $request Object received from form
     */
    private function update(Request $request)
    {
        $id = $request->input('id');

        $update = $this->categoriaConvenio->find($id);
        $update->name = $request->input('name');
        //$update->save();
        
        if ( $request->file('icon') )
        {
            $fileDelete = $this->file;
            $fileDelete = $fileDelete->find($update->icon);
            
            if ($fileDelete)
            {
                $update->icon = null;
                $this->deleteFile($fileDelete);

                /** Add new image */
                $this->upload->path = self::PATH;
                $fileStored = $this->upload->addFile( $request->file('icon') );
                
                if ( count($fileStored) > 0 )
                {
                    $update->icon = $fileStored['FileId'];
                    $update->save();
                }
            }
        }

        $update->save();

        return redirect()->route('adm-categorias-convenios');
    }
    
    /**
     * Function to delete health insurance category
     * 
     * @param Object $request Object received from form
     */
    private function delete(Request $request)
    {
        $id = $request->input('id');
        $delete = $this->categoriaConvenio->find($id);

        if ($delete->icon)
        {
            $fileDelete = $this->file->find($delete->icon);

            if ( $this->deleteFile($fileDelete) ) {
                $delete->delete();
            }
        }

        return redirect()->route('adm-categorias-convenios');
    }

    /**
     * Function to deleteFile
     * 
     * @param Int $id id of file
     */
    private function deleteFile(File $file): bool
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

}
