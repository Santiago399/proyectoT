<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class ProveedorController extends Controller
{
    public function index(){

        $proveedores = Proveedor::paginate(10);
        return view('proveedores.index', compact('proveedores'));

    }

    public function create(){

        return view('proveedores.create');

    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ü]+$/',
            'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ü]+$/',
            'celular' =>'required|regex:/^[0-9]{10}$/|unique:proveedores',
            'correo' => 'required|email|regex:/^[a-z,A-Z,0-9]+@[a-z,A-Z,0-9]+[.][a-zA-Z0-9-]+$/|unique:proveedores',
            'clave' => 'required|numeric',
            'estado' =>'required',

        ]);


        Proveedor::create($request->all());

        SweetAlert::success('proveedor creado correctamente !');

        return redirect()->route('proveedores.index');
        // return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Proveedor $proveedor){
        //$usuario = User::findOrFail($id);
        return view('proveedores.show', compact('proveedor'));

    }

    public function edit(Proveedor $proveedor){

        return view('proveedores.edit', compact('proveedor'));

    }

    public function update(Request $request, Proveedor $proveedor){


        $proveedor->update($request->only('nombre', 'apellido', 'celular', 'correo', 'clave', 'estado'));

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');

    }

    public function destroy(Proveedor $proveedor){

        $proveedor->delete();
        return back()->with('success', 'Proveedor eliminado correctamente');

    }
}
