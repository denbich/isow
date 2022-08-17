<?php

namespace App\Http\Controllers\coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CCloudController extends Controller
{
    public function index()
    {
        
    }

    public function create_folder(Request $request)
    {
        if($request->ajax())
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'color' => 'required',
            ]);

            //$folder = Cloud_folder::create([]);

            $button = '<button class="btn btn-outline-'.$request->color.' mt-1" type="button"><i class="fa-solid fa-folder mr-2"></i> '.$request->name.'</button>';
            return $button;
        }
    }

    public function upload_file(Request $request)
    {
        if($request->ajax())
        {
            return $request->file('file');
        }
    }
}
