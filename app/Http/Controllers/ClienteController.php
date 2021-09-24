<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function show()
    {
        $clienteList = Cliente::all(); // Es lo mismo que decir Select * from brands
        return view('cliente/List', ['list' => $clienteList]);
    }

    function delete($id)
    {
        //Product::destroy($id);
        $cliente = Cliente::findOrfail($id);
        $cliente->delete();
        return redirect('/clientes')->with('message', 'Fue borrada ');
    }

    function form($id = null){

        $cliente = new Cliente();
        if ($id != null) {
            $cliente = Cliente::findOrFail($id);
        }
        return view('cliente/form', ['cliente' => $cliente]);
    }

    function save(Request $request){
            $request->validate([
                'nombre' => 'required|min:3|max:20',
                'correo' => 'required|email|unique:clientes',
                'celular' => 'required|numeric|unique:clientes',
                'direccion' => 'required|unique:clientes',
                'apellido' => 'required|min:3|max:20',
                'estado' => 'required|max:20',

            ]);

            $cliente = new Cliente();
            $message = 'se ha creado un nuevo Proveedor';


            if (intval($request->id) > 0) {

                $cliente = Cliente::findOrFail($request->id);
                $message = 'se ha editado ****';
            }

            $cliente->nombre = $request->nombre;

            $cliente->save();
            return redirect('/clientes')->with('successMessage', $message);
        }
}
