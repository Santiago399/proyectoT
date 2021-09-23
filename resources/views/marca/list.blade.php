@extends('layout')
@section('title', 'Lista de  marca')
@section('palabra', 'Listado de marca')
@section('content')

<a href="{{ route('marca.form')}}" >Nueva marca</a>
@if(Session::has('message'))
     <p class="text-danger"> {{ Session::get('message') }}</p>
@endif
@if(Session::has('successMessage'))
     <p class="text-info"> {{ Session::get('successMessage') }}</p>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $marca)
        <tr>
            <td>{{ $marca->nombre }}</td>



            <td>
                <a href="{{ route('marca.form', ['id'=>$marca->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{ route('marca.delete',['id'=>$marca->id])}}" class="btn btn-danger">Borrar</a>
                {{--<a href="/product/delete/{{$product->id}}" class="btn btn-danger">Borrar</a>--}}
            </td>

        </tr>

        @endforeach
    </tbody>


</table>


@endsection
