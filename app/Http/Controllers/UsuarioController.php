<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function show()
    {
        $usuariosList = Usuario::all(); // Es lo mismo que decir Select * from brands
        return view('usuarios/List', ['list' => $usuariosList]);
    }

    function delete($id)
    {
        //Product::destroy($id);
        $usuarios = Usuario::findOrfail($id);
        $usuarios->delete();
        return redirect('/usuarios')->with('message', 'Fue borrada ');
    }

    function form($id = null){

        $usuario = new Usuario();

        $roles = Rol::orderBy('nombre')->get();
        if ($id != null) {
            $usuario = Usuario::findOrFail($id);
        }
        return view('usuario/form', ['usuario' => $usuario, 'roles' => $roles]);
    }

        function save(Request $request){
            $request->validate([
                'nombre' => 'required|min:3|max:20',
                'apellido' => 'required|min:3|max:20',
                'clave' => 'required|numeric',
                'telcelular' => 'required|numeric|unique:usuarios',
                'correo' => 'required|email|unique:usuarios',
                'estado' => 'required|max:50',
                'rol_id' => 'required',

            ]);

            $usuario = new Usuario();
            $message = 'se ha creado un nuevo Proveedor';


            if (intval($request->id) > 0) {

                $usuario = Usuario::findOrFail($request->id);
                $message = 'se ha editado ---';
            }

            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->clave = $request->clave;
            $usuario->telcelular = $request->telcelular;
            $usuario->correo = $request->correo;
            $usuario->estado = $request->estado;
            $usuario->rol_id = $request->rol;


            $usuario->save();
            return redirect('/usuarios')->with('successMessage', $message);
        }
    }
