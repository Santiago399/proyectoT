@extends('layouts.main', [
    'namePage' => 'entradaMateriales',
    'class' => 'sidebar-mini',
    'activePage' => 'entradaMateriales',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                <form method="post" action="{{ route('entradaMateriales.store') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @include('alerts.success')
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('material_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('material_id') }}</label>
                                    <select name="material_id" id="material_id" class="form-control form-control-alternative{{ $errors->has('material_id') ? ' is-invalid' : '' }}">
                                        <option value="">--Escoja  el material --</option>
                                        @foreach ($materiales as $material)
                                        <option value="{{ $material['id'] }}">{{ $material['nombre'] }}</option>

                                        @endforeach
                                    </select>
                                    @if ($errors->has('material_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('material_id') }}</strong>
                                        </span>
                                    @endif

                                </div>

                                <div class="form-group{{ $errors->has('entrada_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('entrada_id') }}</label>
                                    <select name="entrada_id" id="entrada_id" class="form-control form-control-alternative{{ $errors->has('entrada_id') ? ' is-invalid' : '' }}">
                                        <option value="">--Escoja  el entrada --</option>
                                        @foreach ($entradas as $entrada)
                                        <option value="{{ $entrada['id'] }}">{{ $entrada['fecha'] }}</option>

                                        @endforeach
                                    </select>
                                    @if ($errors->has('entrada_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('entrada_id') }}</strong>
                                        </span>
                                    @endif

                                </div>

                                <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('cantidad') }}</label>
                                    <input type="text" name="cantidad" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el cantidad de la marca ') }}" value="{{ old('cantidad') }}" autofocus>

                                    @if ($errors->has('cantidad'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cantidad') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('estado') }}</label>
                                    <input type="text" name="estado" id="input-name" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el estado de la marca ') }}" value="{{ old('estado') }}" autofocus>

                                    @if ($errors->has('estado'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('estado') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center">
                                    {{-- <a class="btn btn-danger mt-4"  href="{{ route('entradaMateriales.index') }}">{{ __('Volver') }}</a> --}}
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </div>
                </form>
                <hr class="my-4" />
              </div>
          </div>
        <div class="card">
          <div class="card-header">
            <div class="text-right">
                {{-- @can('entradaMateriales.create')
                <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate">Añadir Entrada Material</a>
                @endcan --}}

            </div>
            <h4 class="card-title"> Entrada Materiales </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Entrada id</th>
                    <th>Cantidad</th>
                    <th>Estado</th>

                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($entradaMateriales as $entradaMaterial )
                  <tr>
                    <td>{{ $entradaMaterial->id }}</td>
                    <td>{{ $entradaMaterial->material->nombre }}</td>
                    <td>{{ $entradaMaterial->entrada_id}}</td>
                    <td>{{ $entradaMaterial->cantidad }}</td>
                    <td>{{ $entradaMaterial->estado }}</td>

                    <td class="text-right" >
                        @can('entradaMateriales.edit')
                        <a href="#"  class="btn btn-gray btn-sm btn-icon" data-toggle="modal" data-target="#ModalEdit{{ $entradaMaterial->id}}" > <i class="now-ui-icons ui-2_settings-90"></i></a>

                        @endcan
                        @can('entradaMateriales.destroy')
                        <form action="{{ route('entradaMateriales.destroy', $entradaMaterial->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i >Eliminar</i>
                            </button>
                          </form>
                        @endcan


                      </td>
                      @include('entradaMateriales.modal.edit')
                    </tr>
                    @empty
                    No hay registros
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $entradaMateriales->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('entradaMateriales.modal.create')
@endsection
