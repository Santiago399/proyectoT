<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\EntradaMaterial;
use App\Models\Material;
use Illuminate\Http\Request;

class EntradaMaterialController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

       //
       function show(){
           $entradamaterialList = EntradaMaterial::all(); // Es lo mismo que decir Select * from products
           return view('material/List', ['list' =>$entradamaterialList]);
       }

       function delete($id){
           //Product::destroy($id);
           $entradamaterial = EntradaMaterial::findOrfail($id);
           $entradamaterial->delete();
           return redirect('/entradaMateriales')->with('message', 'El ----- fue borrado');
       }

       function form($id = null){
           $entradaMaterial = new EntradaMaterial();

           $materiales = Material::orderBy('nombre')->get();
           $entradas = Entrada::orderBy('fecha')->get();


           if ($id != null) {
              $entradaMaterial = Material::findOrFail($id);
           }
           return view('entradaMaterial/form',['entradaMaterial' => $entradaMaterial, 'materiales' => $materiales, 'entradas' => $entradas]);
    }

       function save(Request $request){
           $request->validate([
               'material_id' => 'required|max:50',
               'entrada_id' => 'required|max:50',
               'cantidad' => 'required|numeric',
           ]);

           $material = new EntradaMaterial();
           $message = 'se ha creado un nuevo';


           if (intval($request->id)>0) {

               $entradaMaterial = EntradaMaterial::findOrFail($request->id);

               $message = 'se ha editado un mat';
           }


           $entradaMaterial->cantidad = $request->cantidad;
           $entradaMaterial->material_id = $request->material;
           $entradaMaterial->entrada_id = $request->entrada;

           $entradaMaterial->save();
           return redirect('/entradaMateriales')->with('successMessage', $message);

       }
}
