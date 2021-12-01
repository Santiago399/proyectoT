<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Template;
use DB;

class CategoriaController extends Controller
{
    public function index(){

        
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));

    }

    public function create(){

        return $this->edit(new Categoria());

    }
    public function store(Request $request){

        // $request->validate([
        //     'nombre' => 'required|min:3|max:20|unique:categorias',
        
        // ]);
        return $this->update($request, new Categoria());
        // Categoria::create($request->all());
    
        //  return redirect()->route('categorias.index');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Categoria $categoria){
        //$usuario = User::findOrFail($id);
        return view('categorias.show', compact('categoria'));

    }

    public function edit(Categoria $categoria){

        return view('categorias.edit')->withTemplate($categoria);
        // return view('categorias.edit', compact('categoria'));

    }

    public function update(Request $request, Categoria $categoria){

    //     $categoria->update($request->only('nombre'));
    //     return redirect()->route('categorias.index')->with('success', 'Categoria  actualizado correctamente');
            $request->persist($categoria);
            return redirect(route('categorias.index'));
    }

    public function destroy(Categoria $categoria){

        $categoria->delete();

        return back()->with('success', 'Categoria eliminado correctamente');

    }
}
