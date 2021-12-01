<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\SalidaMaterial;
use App\Models\Salida;
use App\Models\EntradaMaterial;
use Illuminate\Http\Request;
use DB;

class SalidaMaterialController extends Controller
{
    public function index(){

        $salidas = Salida::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();
        $entradaMateriales = EntradaMaterial::getData();
        $salidaMateriales = SalidaMaterial::paginate(5);
        return view('salidaMateriales.index', compact('salidaMateriales', 'salidas', 'materiales','entradaMateriales' ));


    }

    public function create(){

        $salidas = Salida::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();

        return view('salidaMateriales.create',compact('salidas', 'materiales'));

    }

    public function store(Request $request){

        $cant_permitida=EntradaMaterial::getCant($request->material_id);
        // $request->validate([
        //     'estado' => 'required',
        //     'cantidad' => 'required|numeric',
        //     'salida_id' => 'required',
        //     'material_id' => 'required',

        // ]);
        if(intval($request->cantidad) > $cant_permitida->cantidad){
            return redirect()->route('salidaMateriales.index')->with('false', 'supero la cantidad permitida');
        }else{
            // SalidaMaterial::create($request->all());
            // $nuevaCantidad=$cant_permitida->cantidad-intval($request->cantidad);
            // EntradaMaterial::cambiarCantidad($nuevaCantidad,$request->material_id);
            $material_id = $request->material_id;
            $salida_id = $request->salida_id;
            $cantidad = $request->cantidad;
            $estado = $request->estado;
            for ($i=0; $i < count($material_id); $i++) { 
                $datasave = [
                    'material_id' => $material_id[$i],
                    'salida_id' => $salida_id[$i],
                    'cantidad' => $cantidad[$i],
                    'estado' => $estado[$i],
                ];
                DB::table('salida_materiales')->insert($datasave);
            } 


            $materiales = Material::findOrFail($request->material_id);
            foreach ($materiales as $indice=> $material){
            $material->cantidad= $material->cantidad-intval($request->cantidad[$indice]);
            $material->save();
            }
            return redirect()->route('salidaMateriales.index')->with('success', 'SALIDA MATERIAL creada correctamente');
           //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA
        }

    }

    public function show(SalidaMaterial $salidamaterial){
        //$usuario = User::findOrFail($id);
        return view('salidaMateriales.show', compact('salidaMaterial'));

    }

    public function edit(SalidaMaterial $salidaMaterial){

        return view('salidaMateriales.edit', compact('salidaMaterial'));

    }

    public function update(Request $request, SalidaMaterial $salidaMaterial){

        $data = $request->only('material_id', 'salida_id');

        $salidaMaterial->update($data);
        return redirect()->route('salidaMateriales.index')->with('success', 'SALIDA MATERIAL actualizado correctamente');
    }

    public function destroy(SalidaMaterial $salidaMaterial){

        $salidaMaterial->delete();
        return back()->with('success', 'SALIDA MATERIAL eliminado correctamente');

    }
}
