@extends('layout')
@section('title', 'Lista de  materiales')
@section('palabra', 'Listado de materiales')
@section('content')
<a href="{{ route('material.form')}}" class="btn btn-primary">Nuevo ----</a>
@if(Session::has('message'))
     <p class="text-danger"> {{ Session::get('message') }}</p>
@endif
@if(Session::has('successMessage'))
     <p class="text-info"> {{ Session::get('successMessage') }}</p>
@endif

@section('css')

 <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
 @stop

<table id="materiales" class="table table-striped table-hover mt-4">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Peso</th>
            <th>Tamaño</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Tipo Material</th>
            <th>Marca</th>
            <th>Proveedor</th>

            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $material)
        <tr>
            <td>{{ $material->nombre }}</td>
            <td>{{ $material->peso }}</td>
            <td>{{ $material->tamaño }}</td>
            <td>{{ $material->cantidad }}</td>
            <td>{{ $material->estado }}</td>
            <td>{{ $material->tipo_id}}</td>
            <td>{{ $material->marca->nombre }}</td>
            <td>{{ $material->proveedor->nombre}}</td>



            <td>
                <a href="{{ route('material.form', ['id'=>$material->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{ route('material.delete',['id'=>$material->id])}}" class="btn btn-danger">Borrar</a>
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
    $('#materiales').DataTable({
        "lengthMenu": [[ 5, 10, 50, -1], [5, 10, 50, "All"]]

    });
} );
</script>

@endsection
