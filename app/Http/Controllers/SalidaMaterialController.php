<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Salida;
use App\Models\SalidaMaterial;
use Illuminate\Http\Request;

class SalidaMaterialController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

       //
       function show(){
           $salidaamaterialList = SalidaMaterial::all(); // Es lo mismo que decir Select * from products
           return view('salidamaterial/List', ['list' =>$salidaamaterialList]);
       }

       function delete($id){
           //Product::destroy($id);
           $salidamaterial = SalidaMaterial::findOrfail($id);
           $salidamaterial->delete();
           return redirect('/salidamateriales')->with('message', 'El ----- fue borrado');
       }

       function form($id = null){
           $salidamaterial = new SalidaMaterial();

           $materiales = Material::orderBy('nombre')->get();
           $salidas = Salida::orderBy('fecha')->get();


           if ($id != null) {
              $salidamaterial = SalidaMaterial::findOrFail($id);
           }
           return view('salidamaterial/form',['salidamaterial' => $salidamaterial, 'materiales' => $materiales, 'salidas' => $salidas]);
    }

       function save(Request $request){
           $request->validate([
               'estado' => 'required|max:50',
               'cantidadMaterial' => 'required|numeric',
               'material_id' => 'required|max:50',
               'salida_id' => 'required|max:50',

           ]);

           $salidamaterial = new SalidaMaterial();
           $message = 'se ha creado un nuevo';


           if (intval($request->id)>0) {

               $salidamaterial = SalidaMaterial::findOrFail($request->id);

               $message = 'se ha editado un mat';
           }

           $salidamaterial->estado = $request->estado;
           $salidamaterial->cantidad = $request->cantidad;
           $salidamaterial->material_id = $request->material;
           $salidamaterial->salida_id = $request->salida;

           $salidamaterial->save();
           return redirect('/salidamateriales')->with('successMessage', $message);

       }
}
