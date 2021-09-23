<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Material;
use App\Models\Proveedor;
use App\Models\TipoMaterial;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

       //
       function show(){
           $materialList = Material::all(); // Es lo mismo que decir Select * from products
           return view('material/List', ['list' =>$materialList]);
       }

       function delete($id){
           //Product::destroy($id);
           $material = Material::findOrfail($id);
           $material->delete();
           return redirect('/materiales')->with('message', 'El ----- fue borrado');
       }

       function form($id = null){
           $material = new Material();

           $tipoMateriales = TipoMaterial::orderBy('nombre')->get();
           $marcas = Marca::orderBy('nombre')->get();
           $proveedores = Proveedor::orderBy('nombre')->get();

           if ($id != null) {
              $material = Material::findOrFail($id);
           }
           return view('material/form',['material' => $material, 'tipoMateriales' => $tipoMateriales, 'marcas' => $marcas, 'proveedores' => $proveedores]);
    }

       function save(Request $request){
           $request->validate([
               'nombre' => 'required|max:50',
               'peso' => 'required|max:50',
               'tamaño' => 'required|max:50',
               'cantidad' => 'required|numeric',
               'estado' => 'required|max:50',
               'tipoMaterial'=> 'required|max:50',
               'marca' => 'required|max:50',
               'proveedor'=> 'required|max:50',
           ]);

           $material = new Material();
           $message = 'se ha creado un nuevo';


           if (intval($request->id)>0) {

               $material = Material::findOrFail($request->id);

               $message = 'se ha editado un mat';
           }

           $material->nombre = $request->nombre;
           $material->peso = $request->peso;
           $material->tamaño = $request->tamaño;
           $material->cantidad = $request->cantidad;
           $material->estado = $request->estado;
           $material->tipo_id = $request->tipoMaterial;
           $material->marca_id = $request->marca;
           $material->proveedor_id = $request->proveedor;

           $material->save();
           return redirect('/materiales')->with('successMessage', $message);

       }
}
