<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\ProveedorRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProveedorController extends Controller
{
    public function index(){

        $proveedores = Proveedor::paginate(10);
        return view('proveedores.index', compact('proveedores'));

    }

    public function create(){

        return view('proveedores.create');

    }

    public function store(ProveedorRequest $proveedor){
        $validator = Validator::make(
            $proveedor->all(), 
            $proveedor->rules(),
            $proveedor->messages()
            );
            if ($validator->valid()) {
       Proveedor::create($proveedor->all()); 
       Alert::success('Registrado', 'Se ha registrado correctamente');
        return redirect()->route('proveedores.index');
        // return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA
    }

    }

    public function show(Proveedor $proveedor){
        //$usuario = User::findOrFail($id);
        return view('proveedores.show', compact('proveedor'));

    }

    public function edit($id){
        $proveedor = Proveedor::findorFail($id);
        return view('proveedores.edit', compact('proveedor'));

    }

    public function update(Request $request, $id){

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());

        Alert::success('Actualizado', 'Se actualizado correctamente');
        return redirect()->route('proveedores.index');

    }

    public function destroy($id){

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        return back()->with('satisfactoriamente', 'Se elimino con éxito.');

    }
}
