@extends('layout')
@section('title', 'Lista ---')
@section('palabra', 'Listado de ---')
@section('content')
<a href="{{ route('tipoMaterial.form')}}" class="btn btn-primary">NuevoTipo Material</a>
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
        @foreach ($list as $tipoMaterial)
        <tr>
            <td>{{ $tipoMaterial->nombre }}</td>




            <td>
                <a href="{{ route('tipoMaterial.form', ['id'=>$tipoMaterial->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{route('tipoMaterial.delete',['id'=>$tipoMaterial->id])}}" class="btn btn-danger">Borrar</a>
                {{--<a href="/product/delete/{{$product->id}}" class="btn btn-danger">Borrar</a>--}}
            </td>

        </tr>

        @endforeach
    </tbody>
</table>
@endsection
