@extends('layouts.main', [
    'namePage' => 'materiales',
    'class' => 'sidebar-mini',
    'activePage' => 'materiales',
  ])

@section('content')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header">
            <div class="text-right">
                @can('materiales.create')
                <a href="{{ route('materiales.create')}}" class="btn btn-sm btn-primary">Añadir materiales </a>
                @endcan
            </div>
            <h4 class="card-title"> Materiales </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="materiales">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Peso</th>
                    <th>Tamaño</th>
                    <th>Cantidad en stock</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Estado</th>
                  <th class="text-right">___</th>
                </thead>
                <tbody>
                    @foreach ($materiales as $material)
                    <tr>
                        <td>{{ $material->id }}</td>
                        <td>{{ $material->nombre }}</td>
                        <td>{{ $material->peso }}</td>
                        <td>{{ $material->tamaño }}</td>
                        <td><strong>{{ $material->cantidad }}</strong></td>
                        <td>{{ $material->tipo->nombre }}</td>
                        <td>{{ $material->marca->nombre }}</td>
                        <td>{{ $material->estado }}</td>
                        <td>
                            @can('materiales.edit')
                                    <a href="{{ route('materiales.edit', $material->id)}}"  class="btn btn-gray btn-sm btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                                @endcan
                                @can('materiales.destroy')
                                    <form action="{{ route('materiales.destroy', $material->id) }}" method="post" style="display: inline-block;" class="formulario-eliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>


<script>
    $('#materiales').DataTable({
                "language": {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }

    });

</script>

@endsection
