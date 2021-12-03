<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Material;
use PDF;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;




class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::orderBy('id', 'DESC')->get();
        $materiales = Material::orderBy('nombre')->get();

        return view("pedidos.index", compact('pedidos', 'materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiales = Material::orderBy('nombre')->get();
        return view("pedidos.create", compact('materiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pedidos = new Pedido;
        // $pedidos -> codigo =$request-> codigo;
        // $pedidos -> fechaEnvio =$request-> fechaEnvio;
        // $pedidos -> materiales =$request-> materiales;
        // $pedidos -> cantidad =$request-> cantidad;
        // $pedidos -> descripcion =$request-> descripcion;
        // $pedidos -> estado =$request-> estado;
        // $pedidos->save();


        Pedido::create($request->all());
        Alert::success('Registrado', 'Se ha registrado correctamente');
        return redirect("/pedidos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedidos = Pedido::findOrFail($id);
        return view("pedidos.show", compact("pedidos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiales = Material::orderBy('nombre')->get();
        $pedidos = Pedido::findOrFail($id);
        return view("pedidos.edit", compact('pedidos', 'materiales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedidos = Pedido::findOrFail($id);
        $pedidos->update($request->all());
        Alert::success('Actualizado', 'Se actualizado correctamente');
        return redirect("/pedidos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidos = Pedido::findOrFail($id);
        $pedidos ->delete();
        return redirect("/pedidos")->with('satisfactoriamente', 'Se elimino con éxito.');
    }

    public function downloadPDF()
    {
        $pedidos = Pedido::all();
        $pdf = PDF::loadView('pedido', compact('pedidos'));

        return $pdf->download('pedidos.pdf');
    }
}
