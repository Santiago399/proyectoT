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

        return view("categorias.create");

    }
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|min:3|max:20|unique:categorias',
        ]);
        
        Categoria::create($request->all());
    
         return redirect()->route('categorias.index');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Categoria $categoria){
        //$usuario = User::findOrFail($id);
        return view('categorias.show', compact('categoria'));

    }

    public function edit($id){

        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit');
        // return view('categorias.edit', compact('categoria'));

    }

    public function update(Request $request, $id){

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index');

    }

    public function destroy($id){

        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return back()->with('success', 'Categoria eliminado correctamente');

    }
}
