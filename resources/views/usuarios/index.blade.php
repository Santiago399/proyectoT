@extends('layouts.main', [
    'namePage' => 'usuarios',
    'class' => 'sidebar-mini',
    'activePage' => 'usuarios',
  ])



@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{__("Añadir Nuevo Usuario")}}</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('usuarios.store') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
            
                            @include('alerts.success')
            
                            <div class="form-row">
                                <div class="form-group col-md-4{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label>{{ _('Nombre Completo') }}</label>
                                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Nombre') }}" value="{{ old('name') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                
                                <div class="form-group col-md-4{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ _('Correo') }}</label>
                                    <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo') }}" value="{{ old('email') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                
                                <div class="form-group col-md-4{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label>{{ _('Contraseña') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}">
                
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="tab-contect">
                                            <div class="tab-pane active">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach ($roles as $id => $role )
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $id }}">
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                               {{ $role }}
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
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Guardar') }}</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @if (session('success'))
        <div class="alert alert-primary">
            {{session('success')}}
        </div>
        @endif
        <div class="card">
          <div class="card-header">
            <div class="text-right">
                <div class="container mt-5 text-center">
                    <form action="{{ route('import-file')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                            <label for="file">  CVS</label>
                          <input type="file" name="file" id="file" class="form-control"/>
                        </div>
                        <button class="btn btn-danger">Importar</button>
                        <a class="btn btn-primary" href="{{ route('export-file')}}" >Exportar</a>
                    </form>
                </div>
                @can('usuario.create')
                <a href="{{ route('usuario.create')}}" class="btn btn-sm btn-primary" >Añadir Usario</a>
                @endcan
            </div>
            <h4 class="card-title"> usuarios</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="usuarios">
                <thead class=" text-primary">
                  <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Roles</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                   @foreach ($usuarios as $usuario )
                  <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td><a href="mailto:{{$usuario->email }}"> {{$usuario->email }}</a></td>
                    <td>
                  @forelse ($usuario->roles as $role )
                    <span class="badge badge-info">{{ $role->name }}</span>
                  @empty
                    <span class="badge badge-danger">No roles </span>
                  @endforelse
                  </td>
                  <td class="text-right" >

                      {{-- <a href="#" class="btn btn-info btn-sm"><i >Detalle</i></a> --}}
                      @can('usuarios.edit')
                      <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-gray btn-sm"><i class="now-ui-icons ui-2_settings-90"></i></a>

                      @endcan
                      @can('usuarios.destroy')
                      <form action="{{ route('usuarios.delete', $usuario->id) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                      <button class="btn btn-danger btn-sm btn-icon" type="submit">
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
    {{-- <div class="container mt-5 text-center">
        <form action="{{ route('import-file')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
                <label for="file">  CVS</label>
              <input type="file" name="file" id="file" class="form-control"/>
            </div>
            <button class="btn btn-danger">Importar</button>
            <a class="btn btn-primary" href="{{ route('export-file')}}" >Exportar</a>
        </form>
    </div> --}}
  </div>
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>


<script>
    $('#usuarios').DataTable({
        responsive: true,
        autoWidth: false,

        "language": {
            "lengthMenu": "Mostrar " +
                             `<select class="custom-select custom-select-sm form-control form-control-sm">
                                <option value='10'>10</option>
                                <option value='25'>25</option>
                                <option value='50'>50</option>
                                <option value='100'>100</option>
                                <option value='-1'>All</option>
                             </select>` +
                           " registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate":{
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
        }
    });
</script>



@endsection

{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

@endsection --}}
