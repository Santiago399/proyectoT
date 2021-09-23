<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $entradaList = Entrada::has('proveedor')->get(); // Es lo mismo que decir Select * from products
        return view('entrada/List', ['list' =>$entradaList]);
    }

    function delete($id){
        //Product::destroy($id);
        $entrada = Entrada::findOrfail($id);
        $entrada->delete();
        return redirect('/entradas')->with('message', 'El --- fue borrado');
    }

    function form($id = null){
        $entrada = new Entrada();
        $proveedor = Proveedor::orderBy('nombre')->get();

        if ($id != null) {
           $entrada = Entrada::findOrFail($id);
        }
        return view('entrada/form',['entrada' => $entrada, 'proveedor' => $proveedor]);
    }
        function save(Request $request){
            $request->validate([
                'fecha' => 'required',
                'proveedor'=> 'required',
            ]);

            $entrada = new Entrada();
            $message = 'se ha creado un entrada nuevo';


            if (intval($request->id)>0) {

                $entrada = Entrada::findOrFail($request->id);
                $message = 'se ha editado un entrada';
            }

            $entrada->fecha = $request->fecha;
            $entrada->proveedor_id = $request->proveedor;

            $entrada->save();
            return redirect('/entradas')->with('successMessage', $message);

    }

}
