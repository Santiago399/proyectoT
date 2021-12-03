@extends('layouts.main', [
    'namePage' => 'categorias',
    'class' => 'sidebar-mini',
    'activePage' => 'categorias',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{__("Añadir Nueva categoria")}}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categorias.store') }}" method="post" class="form-horizontal">
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
                        <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                            <input type="text" name="nombre" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}">                
                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="text-right">
              </div>
            <h4 class="card-title"> Categorias </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @csrf
              <table id="editable" class="table table-bordered table-striped">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @foreach  ($categorias as $categoria)
                  <tr>
                    <td class="id">{{ $categoria->id }}</td>
                    <td class="nombre">{{ $categoria->nombre }}</td>
                    <td>
                      @can('categorias.edit')
                              <a href="{{ route('categorias.edit', $categoria->id)}}"  class="btn btn-gray btn-sm btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                          @endcan
                          @can('categorias.destroy')
                              <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post" style="display: inline-block;" class="formulario-eliminar">
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