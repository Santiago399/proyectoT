@extends('layout')
@section('title', 'Lista de obra')
@section('palabra', 'Listado de obra')
@section('content')
<a href="{{ route('obra.form')}}" class="btn btn-primary">Nuevo ----</a>
@if(Session::has('message'))
     <p class="text-danger"> {{ Session::get('message') }}</p>
@endif
@if(Session::has('successMessage'))
     <p class="text-info"> {{ Session::get('successMessage') }}</p>
@endif

@section('css')

 <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
 @stop

<table id="obras" class="table table-striped table-hover mt-4 ">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>FechaInicio</th>
            <th>FechaEntrega</th>
            <th>Estado</th>
            <th>CantidadMaterial</th>
            <th>TipoMaterial</th>
            <th>Cliente</th>
            <th>Categoria</th>
            <th>Usuario</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $obra)
        <tr>
            <td>{{ $obra->nombre }}</td>
            <td>{{ $obra->fechaInicio }}</td>
            <td>{{ $obra->fechaEntrega }}</td>
            <td>{{ $obra->estado }}</td>
            <td>{{ $obra->cantidadMaterial }}</td>
            <td>{{ $obra->tipoMaterial }}</td>
            <td>{{ $obra->cliente->nombre }}</td>
            <td>{{ $obra->categoria->nombre }}</td>
            <td>{{ $obra->usuario->rol->nombre}}</td>



            <td>
                <a href="{{ route('obra.form', ['id'=>$obra->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{route('obra.delete',['id'=>$obra->id])}}" class="btn btn-danger">Borrar</a>
                {{--<a href="/product/delete/{{$product->id}}" class="btn btn-danger">Borrar</a>--}}
            </td>

        </tr>

        @endforeach
    </tbody>
</table>
@endsection


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#obras').DataTable({
        "lengthMenu": [[ 5, 10, 50, -1], [5, 10, 50, "All"]]

    });
} );
</script>

@endsection

