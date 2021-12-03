<?php

namespace App\Http\Controllers;


use App\Models\Marca;
use App\Models\Material;
use App\Models\Proveedor;
use App\Models\TipoMaterial;
use Illuminate\Http\Request;
use Validator, Redirect; 
use Illuminate\Support\Facades\Input;


class MaterialController extends Controller
{
    public function index(){

        $tipos = TipoMaterial::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();


        $materiales = Material::all();
        return view('materiales.index', compact('materiales','tipos', 'marcas'));

    }

    public function create(){
        $material = new Material();

        // $tipoMaterial = TipoMaterial::orderBy('nombre')->get();
        $tipos = TipoMaterial::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();


        return view('materiales.create', compact('tipos', 'marcas'));
    }
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|max:30|unique:materiales',
            'peso' => 'required|min:1',
            'tamaño' => 'required|min:1',
            'cantidad' => 'required|numeric',
            'tipo_id' => 'required',
            'marca_id' => 'required',
            'estado' => 'required',
        ]);
        

        // $validator = Validator::make(
        //     $request->all()
        // );

        // // if the validator fails, redirect back to the form

        // if ($validator->fails()) {
        //     return Redirect::back()
        //         ->withErrors($validator) // send back all errors to the login form
        //         ->withInput();

        //         $input = Input::all();
        //     } else {
            
        //     $material = new Material();

        //     $material->nombre =Input::get('nombre');
        //     $material->peso =Input::get('peso');
        //     $material->tamaño =Input::get('tamaño');
        //     $material->cantidad =Input::get('cantidad');
        //     $material->tipo_id =Input::get('tipo_id');
        //     $material->marca_id =Input::get('marca_id');
        //     $material->estado =Input::get('estado');
                
        //     $material->save();
            
            Material::create($request->all());

         return redirect()->route('materiales.index')->with('success', 'Material creado correctamente');

        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA
    
    }

    public function show(Request $request, $id){

        $material = Material::findorFail($id);
        
        return view('materiales.show', compact('material'));

    }

    public function edit(Material $material, $id){
          $material = Material::find($material);

        $tipos = TipoMaterial::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();


        return view('materiales.edit', compact('material','tipos','marcas'));

    }

    public function update(Request $request, Material $material){

        // $material=Material::findOrFail($material);
        // $data = $request->only('nombre', 'peso', 'tamaño', 'cantidad', 'tipo_id', 'marca_id', 'estado');
        $material->update($request->all());

        return redirect()->route('materiales.index')->with('success', 'Material actualizado correctamente');
    }

    public function destroy(Material $material){

        $material->delete();
        return back()->with('success', ' Material eliminado correctamente');

    }



}
