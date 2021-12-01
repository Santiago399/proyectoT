<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MaterialesExport;
use App\Imports\MaterialesImport;


class UserImportExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.index');
    }

    public function exportFile(Request $request){

        return Excel::download(new UserExport, 'user-list.xlsx');
    }

    public function importFile(Request $request){
        // try {
        //     if(!$request->hasFile('file')){
        //         throw new \Exception('Archivo no existe');
        //     }
        //     $file = $request->file;
        //     Excel::import(new UserImport, $file);
        // } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        //     $failures = $e->failures();
        //     foreach($failures as $failure){
        //         $failure->row();
        //         $failure->attribute();
        //         $failure->errors();
        //         $failure->values();

        //     }
        // } catch(\Exception $e){
        //     //TODO
        // }
        // //TODO


        Excel::import(new UserImport, request()->file('file'));
        return 'exelente';
    }

    public function exportFileMateriales(Request $request){

        return Excel::download(new MaterialesExport, 'materiales-list.xlsx');
    }

    public function importFileMateriales(Request $request){

        Excel::import(new MaterialesImport, request()->file('file'));
        return 'exelente';
    }

}

