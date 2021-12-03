@extends('layouts.main', [
    'namePage' => 'permisos',
    'class' => 'sidebar-mini',
    'activePage' => 'permisos',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{__("Añadir Nuevo Permiso")}}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="POST" class="form-horizontal">
                    @csrf
            
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="pl-lg-4">
                      <div class="form-row">
                        <div class="form-group col-md-4{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Nombre del permiso') }}</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" autofocus>
                        </div>
                        <div class="form-group col-md-4{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="description">{{ __('descripcion del permiso') }}</label>
                            <input type="text" name="description" id="description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" autofocus>
                        </div>
                    </div>
                    
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{ _('Guardar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Permisos </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th hidden>ID</th>
                    <th>Nombre</th>
                    <th>Created_at</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($permissions as $permission )
                  <tr>
                    <td hidden>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->created_at }}</td>
                    <td class="text-right" >
                        <a href="{{ route('permissions.edit', $permission->id)}}"  class="btn btn-gray btn-sm btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                         <form action="{{ route('permissions.destroy', $permission->id) }}" method="post" style="display: inline-block; " class="formulario-eliminar">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit">
                              <i >Eliminar</i>
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
              {{ $permissions->links() }}
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