<?php

namespace App\Http\Controllers;

use App\Models\TipoMaterial;
use Illuminate\Http\Request;

class TipoMaterialController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $tipoMaterialList = TipoMaterial::all(); // Es lo mismo que decir Select * from products
        return view('tipoMaterial/List', ['list' =>$tipoMaterialList]);
    }

    function delete($id){
        //Product::destroy($id);
        $tipoMaterial = TipoMaterial::findOrfail($id);
        $tipoMaterial->delete();
        return redirect('/tipoMateriales')->with('message', 'El --- fue borrado');
    }

    function form($id = null){
        $tipoMaterial = new TipoMaterial();

        if ($id != null) {
           $tipoMaterial = TipoMaterial::findOrFail($id);
        }
        return view('tipoMaterial/form',['tipoMaterial' => $tipoMaterial]);
    }
        function save(Request $request){
            $request->validate([
                'nombre' => 'required',

            ]);

            $tipoMaterial = new TipoMaterial();
            $message = 'se ha creado un entrada nuevo';


            if (intval($request->id)>0) {

                $tipoMaterial = TipoMaterial::findOrFail($request->id);
                $message = 'se ha editado un entrada';
            }

            $tipoMaterial->nombre = $request->nombre;


            $tipoMaterial->save();
            return redirect('/tipoMateriales')->with('successMessage', $message);

    }

}
