@extends('layout')
@section('title', 'Lista ---')
@section('palabra', 'Listado de ---')
@section('content')
<a href="{{ route('cliente.form')}}" class="btn btn-primary mb-4">Nuevo cliente</a>
@if(Session::has('message'))
     <p class="text-danger"> {{ Session::get('message') }}</p>
@endif
@if(Session::has('successMessage'))
     <p class="text-info"> {{ Session::get('successMessage') }}</p>
@endif



@section('css')


    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
    @stop
    <table  id="proveedores" class="table table-striped table-hover" >
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Celular</th>
                <th>Dirección</th>
                <th>Estado</th>

                <th> </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $cliente)
            <tr>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->correo }}</td>
                <td>{{ $cliente->celular }}</td>
                <td>{{ $cliente->direccion }}</td>
                <td>{{ $cliente->estado }}</td>



                <td>
                    <a href="{{ route('cliente.form', ['id'=>$cliente->id])}}" class="btn btn-warning">Editar</a>
                    <a href="{{route('cliente.delete',['id'=>$cliente->id])}}" class="btn btn-danger">Borrar</a>
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
    $('#').DataTable({
        "lengthMenu": [[ 5, 10, 50, -1], [5, 10, 50, "All"]]

    });
} );
</script>
@endsection
