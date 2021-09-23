@extends('layout')
@section('title', 'Lista ---')
@section('palabra', 'Listado de ---')
@section('content')
<a href="{{ route('proveedor.form')}}" class="btn btn-primary">Nuevo ----</a>
@if(Session::has('message'))
     <p class="text-danger"> {{ Session::get('message') }}</p>
@endif
@if(Session::has('successMessage'))
     <p class="text-info"> {{ Session::get('successMessage') }}</p>
@endif
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Proveedor</th>


            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $entrada)
        <tr>
            <td>{{ $entrada->fecha }}</td>
            <td>{{ $entrada->apellido }}</td>
            <td>{{ $entrada->proveedor->nombre }}</td>



            <td>
                <a href="{{ route('entrada.form', ['id'=>$entrada->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{route('entrada.delete',['id'=>$entrada->id])}}" class="btn btn-danger">Borrar</a>
                {{--<a href="/product/delete/{{$product->id}}" class="btn btn-danger">Borrar</a>--}}
            </td>

        </tr>

        @endforeach
    </tbody>
</table>
@endsection
