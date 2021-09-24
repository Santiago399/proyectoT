@extends('layout')
@section('title', 'Lista de  materiales')
@section('palabra', 'Listado de materiales')
@section('content')
<a href="{{ route('entradaMaterial.form')}}" class="btn btn-primary">Nuevo ----</a>
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
            <th>Cantidad</th>
            <th>Entrada</th>
            <th>Material</th>

            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $entradaMaterial)
        <tr>
            <td>{{ $entradaMaterial->cantidad }}</td>
            <td>{{ $entradaMaterial->entrada->nombre }}</td>
            <td>{{ $entradaMaterial->material->nombre}}</td>



            <td>
                <a href="{{ route('entradaMaterial.form', ['id'=>$entradaMaterial->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{ route('entradaMaterial.delete',['id'=>$entradaMaterial->id])}}" class="btn btn-danger">Borrar</a>
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
