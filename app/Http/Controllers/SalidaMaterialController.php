<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\SalidaMaterial;
use App\Models\Salida;
use App\Models\EntradaMaterial;
use Illuminate\Http\Request;

class SalidaMaterialController extends Controller
{
    public function index(){

        $salidas = Salida::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();
        $entradaMateriales = EntradaMaterial::getData();
        $salidaMateriales = SalidaMaterial::paginate(5);
        return view('salidaMateriales.index', compact('salidaMateriales', 'salidas', 'materiales','entradaMateriales' ));


    }

    public function create(){

        $salidas = Salida::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();

        return view('salidaMateriales.create',compact('salidas', 'materiales'));

    }

    public function store(Request $request){

        $cant_permitida=EntradaMaterial::getCant($request->material_id);
        $request->validate([
            'estado' => 'required',
            'cantidad' => 'required|numeric',
            'salida_id' => 'required',
            'material_id' => 'required',

        ]);
        if(intval($request->cantidad) > $cant_permitida->cantidad){
            return redirect()->route('salidaMateriales.index')->with('false', 'supero la cantidad permitida');
        }else{
            SalidaMaterial::create($request->all());
            $nuevaCantidad=$cant_permitida->cantidad-intval($request->cantidad);
            EntradaMaterial::cambiarCantidad($nuevaCantidad,$request->material_id);
            $material = Material::findOrFail($request->material_id);
            $material->cantidad= $material->cantidad-$request->cantidad;
            $material->save();
            return redirect()->route('salidaMateriales.index')->with('success', 'SALIDA MATERIAL creada correctamente');
           //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA
        }

    }

    public function show(SalidaMaterial $salidamaterial){
        //$usuario = User::findOrFail($id);
        return view('salidaMateriales.show', compact('salidaMaterial'));

    }

    public function edit(SalidaMaterial $salidaMaterial){

        return view('salidaMateriales.edit', compact('salidaMaterial'));

    }

    public function update(Request $request, SalidaMaterial $salidaMaterial){

        $data = $request->only('material_id', 'salida_id');

        $salidaMaterial->update($data);
        return redirect()->route('salidaMateriales.index')->with('success', 'SALIDA MATERIAL actualizado correctamente');
    }

    public function destroy(SalidaMaterial $salidaMaterial){

        $salidaMaterial->delete();
        return back()->with('success', 'SALIDA MATERIAL eliminado correctamente');

    }
}
