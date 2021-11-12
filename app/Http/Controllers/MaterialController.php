<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Material;
use App\Models\Proveedor;
use App\Models\TipoMaterial;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(){

        $tipos = TipoMaterial::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();


        $materiales = Material::all();
        return view('materiales.index', compact('materiales','tipos', 'marcas'));

    }

    public function create(){
        $material = new Material();

        // $tipoMaterial = TipoMaterial::orderBy('nombre')->get();
        $tipos = TipoMaterial::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();


        return view('materiales.create', compact('tipos', 'marcas'));
    }
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|min:1|unique:materiales',
            'peso' => 'required|min:1',
            'tamaño' => 'required|min:1',
            'cantidad' => 'required|numeric',
            'tipo_id' => 'required',
            'marca_id' => 'required',
            'estado' => 'required',

        ]);


        Material::create($request->all());

         return redirect()->route('materiales.index')->with('success', 'Material creado correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Material $material){

        return view('materiales.show', compact('material'));

    }

    public function edit(Material $material){
          $material = Material::find($material);

        $tipos = TipoMaterial::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();


        return view('materiales.edit', compact('material','tipos','marcas'));

    }

    public function update(Request $request, Material $material){

        // $material=Material::findOrFail($material);
        // $data = $request->only('nombre', 'peso', 'tamaño', 'cantidad', 'tipo_id', 'marca_id', 'estado');
        $material->update($request->all());

        return redirect()->route('materiales.index')->with('success', 'Material actualizado correctamente');
    }

    public function destroy(Material $material){

        $material->delete();
        return back()->with('success', ' Material eliminado correctamente');

    }

}
