<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    function show(){
        $marcaList = Marca::all(); // Es lo mismo que decir Select * from products
        return view('marca/List', ['list' =>$marcaList]);
    }

    function delete($id){
        //Product::destroy($id);
        $marca = Marca::findOrfail($id);
        $marca->delete();
        return redirect('/marca')->with('message', 'El ----- fue borrado');
    }

    function form($id = null){
        $marca = new Marca();

        if ($id != null) {
           $marca = Marca::findOrFail($id);
        }
        return view('marca/form',['marca' => $marca]);
    }

    function save(Request $request){
        $request->validate([
            'nombre' => 'required|max:50',

        ]);

        $marca = new Marca();
        $message = 'se ha creado un nuevo';


        if (intval($request->id)>0) {

            $marca = Marca::findOrFail($request->id);
            $message = 'se ha editado un mat';
        }

        $marca->nombre = $request->nombre;


        $marca->save();
        return redirect('/marcas')->with('successMessage', $message);

    }
}
