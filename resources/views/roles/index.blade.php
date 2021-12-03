@extends('layouts.main', [
    'namePage' => 'roles',
    'class' => 'sidebar-mini',
    'activePage' => 'roles',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
        @endif


        <div class="card">
          <div class="card-header">
            <div class="text-right">
              <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Añadir Rol</a>
            </div>
            <h4 class="card-title"> Roles </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th hidden>ID</th>
                    <th>Nombre</th>
                    
                    <th>Permisos</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($roles as $role )
                  <tr>
                    <td hidden>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    
                    <td>
                      @forelse ($role->permissions as $permission )
                        <span class="badge badge-info"> {{ $permission->description }} </span>
                      @empty
                        <span class="badge badge-danger"> No hay permisos agregados</span>
                      @endforelse
                    </td>
                    <td class="text-right" >

                        {{-- <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a> --}}
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-gray btn-sm"><i class="now-ui-icons ui-2_settings-90"></i></a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post" style="display: inline-block;" class="d-inline formulario-eliminar">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                          </form>
                      </td>
                    </tr>
                    @empty
                    No hay registros
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $roles->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')

@if (session('satisfactoriamente') == 'Se elimino con éxito.')
    <script>
      Swal.fire(
      '¡Eliminado!',
      'El registro se elimino con éxito.',
      'success'
    )
    </script>
@endif
<script>

$('.formulario-eliminar').submit(function (e) {
  e.preventDefault();


  Swal.fire({
  title: '¿Estas seguro?',
  text: "¡El registro se eliminara definitivamente!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, eliminar!',
  cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    // Swal.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )

    this.submit();
  }
})
  
});

</script>
    
@endsection