<?php

namespace App\Http\Controllers;

use App\Models\EntradaMaterial;
use App\Models\Entrada;
use App\Models\Material;
use Illuminate\Http\Request;

class EntradaMaterialController extends Controller
{
    public function index(){

        $entradas = Entrada::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();

        $entradaMateriales = EntradaMaterial::paginate(5);
        return view('entradaMateriales.index', compact('entradaMateriales', 'entradas', 'materiales'));

    }

    public function create(){

        $entradas = Entrada::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();

        return view('entradaMateriales.create',compact('entradas', 'materiales'));

    }

    public function store(Request $request){

        $cant_permitida=EntradaMaterial::getCant($request->material_id);
        $request->validate([
            'estado' => 'required',
            'cantidad' => 'required|numeric',
            'material_id' => 'required',
            'entrada_id' => 'required',
        ]);

        if(intval($request->nuevaCantidad)){
            return redirect()->route('entradaMateriales.index')->with('true', 'cantida rehistrada');
        }else{
            EntradaMaterial::create($request->all());
            $material = Material::findOrFail($request->material_id);
            $material->cantidad= $material->cantidad+$request->cantidad;
            $material->save();
            return redirect()->route('entradaMateriales.index')->with('success', 'SALIDA MATERIAL creada correctamente');
           //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA
        }
    }

    public function edit(EntradaMaterial $entradaMaterial){

        $entradas = Entrada::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();

        return view('entradaMateriales.edit', compact('entradaMaterial','entradas', 'materiales'));

    }

    public function show(EntradaMaterial $entradaMaterial){
        //$usuario = User::findOrFail($id);
        return view('entradaMateriales.show', compact('entradaMaterial'));

    }


    public function update(Request $request, EntradaMaterial $entradaMaterial){

        $data = $request->only('material_id', 'entrada_id', 'cantidad', 'estado');

        $entradaMaterial->update($data);
        return redirect()->route('entradaMateriales.index')->with('success', 'Entrada Material actualizado correctamente');
    }

    public function destroy(EntradaMaterial $entradaMaterial){

        $entradaMaterial->delete();
        return back()->with('success', 'Entrada Material eliminado correctamente');

    }
}
