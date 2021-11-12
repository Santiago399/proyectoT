@extends('layouts.main', [
    'namePage' => 'obras',
    'class' => 'sidebar-mini',
    'activePage' => 'obras',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="text-right">
                @can('obras.create')
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate">Añadir obra</a>
                @endcan
              </div>
            <h4 class="card-title"> Obras </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="obras">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Entrega</th>
                    <th>Estado</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Cliente</th>
                    <th>Categoria</th>
                    <th>Usuario</th>
                  <th class="text-right">Acciones</th>
                </thead>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('obras.modal.create')
  @include('obras.modal.edit')
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success') == ' eliminado correctamente')
   <script>
        Swal.fire(
            '¡Eliminado!',
            'Se ha eliminado con éxito.',
            'success'
            )
    </script>

@endif
<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
        title: '¿Estas seguro?',
        text: "esta marca se eliminara definitivamente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire(
            // 'Deleted!',
            // 'Your file has been deleted.',
            // 'success'
            // )

            this.submit();
        }
      })
    });
    $('#obras').DataTable({
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
                },
                "order": [[ 0, "asc" ]],
                "processing": true,
                "responsive": true,
                "serverSide": true,
                "ajax": "{{ route('ajax.request.obras')}}",
                "columns":[
                {"data":"id"},
                {"data":"nombre"},
                {"data":"fechaInicio"},
                {"data":"fechaEntrega"},
                {"data":"estado"},
                {"data":"descripcion"},
                {"data":"cantidad"},
                {"data":"cliente"},
                {"data":"categoria"},
                {"data":"usuario"},
                { "data": "accion",orderable:false, searchable:false },
                ],

    });
</script>

@endsection
