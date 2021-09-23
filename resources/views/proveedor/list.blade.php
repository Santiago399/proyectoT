@extends('layout')
@section('title', 'Lista ---')
@section('palabra', 'Listado de ---')
@section('content')
<a href="{{ route('proveedor.form')}}" class="btn btn-primary mb-4">Nuevo Proveedor</a>
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
                <th>Apellido</th>
                <th>Celular</th>
                <th>Correo</th>
                <th>Estado</th>

                <th> </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $proveedor)
            <tr>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->apellido }}</td>
                <td>{{ $proveedor->celular }}</td>
                <td>{{ $proveedor->correo }}</td>
                <td>{{ $proveedor->estado }}</td>



                <td>
                    <a href="{{ route('proveedor.form', ['id'=>$proveedor->id])}}" class="btn btn-warning">Editar</a>
                    <a href="{{route('proveedor.delete',['id'=>$proveedor->id])}}" class="btn btn-danger">Borrar</a>
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
    $('#proveedores').DataTable({
        "lengthMenu": [[ 5, 10, 50, -1], [5, 10, 50, "All"]]

    });
} );
</script>
@endsection
