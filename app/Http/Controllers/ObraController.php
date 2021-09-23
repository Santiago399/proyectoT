<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Obra;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $obraList = Obra::all(); // Es lo mismo que decir Select * from products
        return view('obra/List', ['list' =>$obraList]);
    }

    function delete($id){
        //Product::destroy($id);
        $obra = Obra::findOrfail($id);
        $obra->delete();
        return redirect('/obras')->with('message', 'El ----- fue borrado');
    }

    function form($id = null){
        $obra = new Obra();
        $clientes = Cliente::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();
        $usuarios = Usuario::orderBy('rol_id')->get();
        $roles = Usuario::orderBy('nombre')->get();

        if ($id != null) {
           $obra = Obra::findOrFail($id);
        }
        return view('obra/form',['obra' => $obra, 'clientes' => $clientes, 'categorias' => $categorias, 'usuarios' => $usuarios, 'roles' => $roles]);
    }

    function save(Request $request){
        $request->validate([
            'nombre' => 'required|max:50',
            'fechaInicio' => 'required|max:50',
            'fechaEntrega' => 'required|max:50',
            'estado' => 'required|max:50',
            'cantidadMaterial' => 'required|numeric',
            'tipoMaterial'=> 'required|max:50',
            'cliente' => 'required|max:50',
            'categoria'=> 'required|max:50',
            'usuario'=> 'required|max:50',

        ]);

        $obra = new Obra();
        $message = 'se ha creado un nuevo';


        if (intval($request->id)>0) {

            $obra= Obra::findOrFail($request->id);
            $message = 'se ha editado un mat';
        }

        $obra->nombre = $request->nombre;
        $obra->fechaInicio = $request->fechaInicio;
        $obra->fechaEntrega = $request->fechaEntrega;
        $obra->estado = $request->estado;
        $obra->cantidadMaterial = $request->cantidadMaterial;
        $obra->tipoMaterial = $request->tipoMaterial;
        $obra->cliente_id = $request->cliente;
        $obra->categoria_id = $request->categoria;
        $obra->usuario_id = $request->usuario;

        $obra->save();
        return redirect('/obras')->with('successMessage', $message);

    }
}
