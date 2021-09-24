<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\Salida;

use Illuminate\Http\Request;

class SalidaController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $salidaList = Salida::all(); // Es lo mismo que decir Select * from products
        return view('salida/List', ['list' =>$salidaList]);
    }

    function delete($id){
        //Product::destroy($id);
        $salida = Salida::findOrfail($id);
        $salida->delete();
        return redirect('/salidas')->with('message', 'El --- fue borrado');
    }

    function form($id = null){
        $salida = new Salida();
        $obras = Obra::orderBy('nombre')->get();

        if ($id != null) {
           $salida = Salida::findOrFail($id);
        }
        return view('salida/form',['salida' => $salida, 'obras' => $obras]);
    }
        function save(Request $request){
            $request->validate([
                'fecha' => 'required',
                'obra'=> 'required',
            ]);

            $salida = new Salida();
            $message = 'se ha creado un entrada nuevo';


            if (intval($request->id)>0) {

                $salida = Salida::findOrFail($request->id);
                $message = 'se ha editado un entrada';
            }

            $salida->fecha = $request->fecha;
            $salida->obra_id = $request->obra;

            $salida->save();
            return redirect('/salidas')->with('successMessage', $message);

    }

}
