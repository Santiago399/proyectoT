<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ObrasImport;


class ObrasImportController extends Controller
{
    public function store(Request $request){

        $file = $request->file('file');

        // Excel::import(new ObrasImport, $file);
        // return back()->withStatus('Excel importado satisfactoriamente');
        Excel::import(new ObrasImport, request()->file('file'));
        return 'exelente';
    }
}
