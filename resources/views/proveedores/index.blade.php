@extends('layouts.main', [
    'namePage' => 'proveedores',
    'class' => 'sidebar-mini',
    'activePage' => 'proveedores',
  ])

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
  <div class="panel-header panel-header-sm">
    <h1>jey</h1>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="container">
              <h2>Proveedores</h2>
              <form id="proveedor" action="{{ route('proveedores.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-4 form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="">{{ __('Nombre') }}</label>
                        <input type="text" name="nombre" id="nombre" 
                        class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                         placeholder="{{ __('Ingrese su nombre') }}" 
                         value="{{ old('nombre') }}" minlength="3" >
    
                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-4 form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                      <label class="form-control-label" for="">{{ __('apellido') }}</label>
                      <input type="text" name="apellido" id="apellido"
                       class="form-control form-control-alternative{{ $errors->has('apellido') ? ' is-invalid' : '' }}" 
                       placeholder="{{ __('Ingrese el apellido ') }}" 
                       value="{{ old('apellido') }}" minlength="3" >
  
                      @if ($errors->has('apellido'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('apellido') }}</strong>
                          </span>
                      @endif
                  </div>
                    <div class="col-md-4 form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="">{{ __('celular') }}</label>
                        <input type="number" name="celular" id="celular" 
                        class="form-control form-control-alternative{{ $errors->has('celular') ? ' is-invalid' : '' }}" 
                        placeholder="{{ __('Celular (10 dijitos) ') }}" 
                        value="{{ old('celular') }}">
    
                        @if ($errors->has('celular'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('celular') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 form-group{{ $errors->has('correo') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="">{{ __('correo') }}</label>
                    <input type="email" name="correo" id="correo" 
                    class="form-control form-control-alternative{{ $errors->has('correo') ? ' is-invalid' : '' }}" 
                    placeholder="{{ __('Correo ') }}" 
                    value="{{ old('correo') }}" >

                    @if ($errors->has('correo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('correo') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-3{{ $errors->has('estado') ? ' has-danger' : '' }}">
                                <label for="estado">Estado:</label>
                                <select class="form-control" id="estado" name="estado">
                                <option value="Activo">Activo</option>
                                @can('usuarios.index')
                                <option value="Inactivo">Inactivo</option>
                                @endcan
                              </select>
                            @if ($errors->has('estado'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                            @endif
                        </div>
                </div>
            
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Guardar') }}</button>
                </div>
            </form>

            </div>
          </div>
        </div>
        @if (session('success'))
        <div class="alert alert-primary" id="result">
            {{session('success')}}
        </div>
        @endif
        <div class="card">
          <div class="card-header">
            <div class="text-right">
                {{-- @can('proveedores.create')
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate"">Añadir proveedor</a>
                @endcan --}}
            </div>
            <h4 class="card-title"> Proveedores </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th hidden>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Estado</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($proveedores as $proveedor )
                  <tr>
                    <td hidden>{{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->apellido }}</td>
                    <td>{{ $proveedor->celular }}</td>
                    <td>{{ $proveedor->correo }}</td>
                    <td>{{ $proveedor->estado }}</td>
                    <td class="text-right" >
                        @can('proveedores.edit')
                        <a href="{{ route('proveedores.edit', $proveedor->id)}}"  class="btn btn-gray btn-sm btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                        @endcan
                        @can('proveedores.destroy')
                        <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="post" style="display: inline-block; " class="formulario-eliminar">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                        </form>
                        @endcan
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
              {{ $proveedores->links() }}
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