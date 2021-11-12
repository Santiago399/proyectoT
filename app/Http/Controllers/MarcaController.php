<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(){

        $marcas = Marca::paginate(5);
        return view('marcas.index', compact('marcas'));

    }

    public function create(){

        return view('marcas.create');

    }
    public function store(Request $request){


        foreach($request->nombres as $key=>$nombres){
            $data = new Marca();
            $data->nombre = $nombres;
            $data->save();

        }

        // $request->validate([
        //     'nombre' => 'required|min:3|max:20|unique:marcas',

        // ]);

         return redirect()->route('marcas.index')->with('success', 'Marca creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Marca $marca){
        //$usuario = User::findOrFail($id);
        return view('marcas.show', compact('marca'));

    }

    public function edit(Marca $marca){

        return view('marcas.edit', compact('marca'));

    }

    public function update(Request $request, Marca $marca){

        // $marca=Marca::findOrFail($marca);
        $data = $request->only('nombre');

        $marca->update($data);
        return redirect()->route('marcas.index')->with('success', 'Marca actualizada correctamente');
    }

    public function destroy(Marca $marca){

        $marca->delete();
        return back()->with('success', 'Marca eliminado correctamente');

    }
}
