@extends('layouts.main', [
    'namePage' => 'marcas',
    'class' => 'sidebar-mini',
    'activePage' => 'marcas',
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
              <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate" >Añadir marca</a>
            </div>
            <h4 class="card-title"> Marcas </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($marcas as $marca)
                  <tr>
                    <td>{{ $marca->id }}</td>
                    <td>{{ $marca->nombre }}</td>
                    <td class="text-right" >

                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEdit{{ $marca->id}}" ><i >Editar</i></a>
                        <form action="{{ route('marcas.destroy', $marca->id) }}" method="post" style="display: inline-block;" class="formulario-eliminar">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i >Eliminar</i>
                            </button>
                        </form>
                      </td>
                      @include('marcas.modal.edit')
                    </tr>
                    @empty
                    No hay registros
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $marcas->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('marcas.modal.create')
@endsection

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success') == 'marca eliminado correctamente')
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
        confirmButtonText: '¡Sí, eliminar!'
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


</script>

@endsection
