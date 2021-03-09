<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edital;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $editais = new Edital();
        $editais = $editais->listAllToSitePageEditais($request)->get();

        return view('editais')->withEditais($editais);
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
            return redirect(url('editais'));
        }
    }
}
