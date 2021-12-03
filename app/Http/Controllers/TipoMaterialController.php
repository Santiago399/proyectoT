<?php

namespace App\Http\Controllers;

use App\Models\TipoMaterial;
use Illuminate\Http\Request;

class TipoMaterialController extends Controller
{
    public function index(){

        $tipoMateriales = TipoMaterial::paginate(5);
        return view('tipoMateriales.index', compact('tipoMateriales'));

    }

    public function create(){

        return view('tipoMateriales.create');

    }
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|min:3|max:20|unique:tipo_materiales',
        ]);

        foreach($request->nombres as $key=>$nombres){
            $data = new TipoMaterial();
            $data->nombre = $nombres;
            $data->save();

        }

         return redirect()->route('tipoMateriales.index')->with('success', 'Tipo Material creado correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(TipoMaterial $tipoMaterial){
        //$usuario = User::findOrFail($id);
        return view('tipoMateriales.show', compact('tipoMaterial'));

    }

    public function edit(TipoMaterial $tipoMaterial){

        return view('tipoMateriales.edit', compact('tipoMaterial'));

    }

    public function update(Request $request, TipoMaterial $tipoMaterial){

        // $marca=Marca::findOrFail($marca);
        $data = $request->only('nombre');

        $tipoMaterial->update($data);
        return redirect()->route('tipoMateriales.index')->with('success', 'tipo$tipoMaterial actualizada correctamente');
    }

    public function destroy(TipoMaterial $tipoMaterial){

        $tipoMaterial->delete();
        return back()->with('success', 'Tipo Material eliminado correctamente');

    }
}
