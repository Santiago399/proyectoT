<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function show()
    {
        $categoriaList = Categoria::all(); // Es lo mismo que decir Select * from brands
        return view('categoria/List', ['list' => $categoriaList]);
    }

    function delete($id)
    {
        //Product::destroy($id);
        $categoria = Categoria::findOrfail($id);
        $categoria->delete();
        return redirect('/categorias')->with('message', 'Fue borrada ');
    }

    function form($id = null){

        $categoria = new Categoria();
        if ($id != null) {
            $categoria = Categoria::findOrFail($id);
        }
        return view('categoria/form', ['categoria' => $categoria]);
    }

    function save(Request $request){
            $request->validate([
                'nombre' => 'required|min:3|max:20|unique:categorias',

            ]);

            $categoria = new Categoria();
            $message = 'se ha creado un nuevo Proveedor';


            if (intval($request->id) > 0) {

                $categoria = Categoria::findOrFail($request->id);
                $message = 'se ha editado ****';
            }

            $categoria->nombre = $request->nombre;

            $categoria->save();
            return redirect('/categorias')->with('successMessage', $message);
        }
}
