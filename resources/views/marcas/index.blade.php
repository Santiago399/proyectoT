@extends('layouts.main', [
    'namePage' => 'marcas',
    'class' => 'sidebar-mini',
    'activePage' => 'marcas',
  ])

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

@endsection

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <div class="container">
                    <h2>Marcas</h2>
                    <p></p>
                    <form action="{{ route('marcas.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                    <table class="table">
                      <thead>
                        <tr>

                          <th>Nombre</th>
                          <th><a href="javascript:;" class="btn btn-info addRow"> +</a></th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><input type="text" name="nombres[]" id="nombres[]" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre de la marca ') }}" value="{{ old('nombre') }}"></td>
                          <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    <input type="submit" value="submit">
                    </form>
                  </div>
                    {{-- <form action="{{ route('marcas.store') }}" method="post"   class="form-horizontal">
                        @csrf


                        <h6 class="heading-small text-muted mb-4">{{ __(' Formulario Marca') }}</h6>
                        <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
                        <th><a href="javascript:;" class="btn btn-info addRow"> +</a></th>

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
                                <input type="text" name="nombre" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre de la marca ') }}" value="{{ old('nombre') }}" autofocus>

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
                    <hr class="my-4" /> --}}
              </div>
          </div>
        @if (session('success'))
        <div class="alert alert-primary">
            {{session('success')}}
        </div>
        @endif
        <div class="card">
          <div class="card-header">
            <div class="text-right">
                {{-- @can('marcas.create')
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate">Añadir marca</a>
                @endcan --}}
            </div>
            <h4 class="card-title"> Marcas </h4>
          </div>
          {{-- <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="marcas">
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
                            @can('marcas.edit')
                            <a href="{{ route('marcas.edit', $marca->id)}}" class="btn btn-gray btn-sm btn-icon"><i class="now-ui-icons ui-2_settings-90"></i></a>
                            @endcan
                            @can('marcas.destroy')
                            <form action="{{ route('marcas.destroy', $marca->id) }}" method="post" style="display: inline-block;" class="formulario-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                </button>
                            </form>
                            @endcan
                        </td>
                         @include('marcas.modal.edit')
                    </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

<script>
    $('#marcas').DataTable({
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

<script>
    $('thead').on('click', '.addRow', function(){
        var tr = '<tr>'+
            '<td><input type="text" name="nombres[]" id="nombres[]" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre de la marca ') }}" value="{{ old('nombre') }}"></td>'+
            '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
            '</tr>';

            $('tbody').append(tr);

    });

    $('tbody').on('click', '.deleteRow', function(){
        $(this).parent().parent().remove();
    })
</script>

@endsection





