<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function show()
    {
        $proveedorList = Proveedor::all(); // Es lo mismo que decir Select * from brands
        return view('proveedor/List', ['list' => $proveedorList]);
    }

    function delete($id)
    {
        //Product::destroy($id);
        $proveedor = Proveedor::findOrfail($id);
        $proveedor->delete();
        return redirect('/proveedores')->with('message', 'Fue borrada ');
    }

    function form($id = null){

        $proveedor = new Proveedor();
        if ($id != null) {
            $proveedor = Proveedor::findOrFail($id);
        }
        return view('proveedor/form', ['proveedor' => $proveedor]);
    }

        function save(Request $request){
            $request->validate([
                'nombre' => 'required|min:3|max:20',
                'apellido' => 'required|min:3|max:20',
                'celular' => 'required|numeric|unique:proveedores',
                'correo' => 'required|email|unique:proveedores',
                'estado' => 'required|max:50',

            ]);

            $proveedor = new Proveedor();
            $message = 'se ha creado un nuevo Proveedor';


            if (intval($request->id) > 0) {

                $proveedor = Proveedor::findOrFail($request->id);
                $message = 'se ha editado ---';
            }

            $proveedor->nombre = $request->nombre;
            $proveedor->apellido = $request->apellido;
            $proveedor->celular = $request->celular;
            $proveedor->correo = $request->correo;
            $proveedor->estado = $request->estado;


            $proveedor->save();
            return redirect('/proveedores')->with('successMessage', $message);
        }
    }
