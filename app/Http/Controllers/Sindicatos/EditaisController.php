<?php

namespace App\Http\Controllers\Sindicatos;
use App\Http\Controllers\Controller;
use App\Models\Edital;

use Illuminate\Http\Request;

class EditaisController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $editais = new Edital();
        $editais = $editais->listAllToSitePageEditais($request)->get();

        return view('sindicatos.editais')->withEditais($editais);
    }

    public function download(Request $request, $id = null)
    {
        $download = false;

        if (is_numeric($id))
        {
            $edital = new Edital();
            $edital = $edital->findById($id);

            if ($edital)
            {
                $download = $edital->file_pathfile . '/' . $edital->file_namefile;
                return response()->download($download);
            }
        }

        if (! $download)
        {
            return redirect(url('sindicatos.editais'));
        }
    }

}
