<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function show()
    {
        $rolList = Rol::all(); // Es lo mismo que decir Select * from brands
        return view('rol/List', ['list' => $rolList]);
    }

    function delete($id)
    {
        //Product::destroy($id);
        $rol = Rol::findOrfail($id);
        $rol->delete();
        return redirect('/roles')->with('message', 'Fue borrada ');
    }

    function form($id = null){

        $rol = new Rol();
        if ($id != null) {
            $rol = Rol::findOrFail($id);
        }
        return view('rol/form', ['rol' => $rol]);
    }

    function save(Request $request){
            $request->validate([
                'nombre' => 'required|min:3|max:20|unique:roles',

            ]);

            $rol = new Rol();
            $message = 'se ha creado un nuevo Proveedor';


            if (intval($request->id) > 0) {

                $rol = Rol::findOrFail($request->id);
                $message = 'se ha editado ****';
            }

            $rol->nombre = $request->nombre;

            $rol->save();
            return redirect('/roles')->with('successMessage', $message);
        }
}

