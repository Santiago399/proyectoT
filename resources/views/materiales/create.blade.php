@extends('layouts.main', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'profile',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{__("Añadir Nuevo Material")}}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('materiales.store') }}" method="POST" class="form-horizontal">
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
                            <div class="form-group col-md-4{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                                <input type="text" name="nombre" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre del material ') }}" value="{{ old('nombre') }}" autofocus>
                
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4{{ $errors->has('peso') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('peso') }}</label>
                                <input type="text" name="peso" id="input-name" class="form-control form-control-alternative{{ $errors->has('peso') ? ' is-invalid' : '' }}" placeholder="{{ __('Peso del material ') }}" value="{{ old('peso') }}" autofocus>
                
                                @if ($errors->has('peso'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('peso') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4{{ $errors->has('tamaño') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('tamaño') }}</label>
                                <input type="text" name="tamaño" id="input-name" class="form-control form-control-alternative{{ $errors->has('tamaño') ? ' is-invalid' : '' }}" placeholder="{{ __('Tamaño del material ') }}" value="{{ old('tamaño') }}" autofocus>
                
                                @if ($errors->has('tamaño'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tamaño') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('cantidad') }}</label>
                                <input type="text" name="cantidad" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Cantidad del material ') }}" value="{{ old('cantidad') }}" autofocus>
                
                                @if ($errors->has('cantidad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cantidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3{{ $errors->has('tipo_id') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Tipo Material') }}</label>
                                <select name="tipo_id" id="tipo_id" class="form-control form-control-alternative{{ $errors->has('tipo_id') ? ' is-invalid' : '' }}">
                                    <option value="">--Seleccione --</option>
                                    @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo['id'] }}">{{ $tipo['nombre'] }}</option>
                
                                    @endforeach
                                </select>
                                @if ($errors->has('tipo_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo_id') }}</strong>
                                    </span>
                                @endif
                
                            </div>
                            <div class="form-group col-md-3{{ $errors->has('marca_id') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Marca Del Material') }}</label>
                                <select name="marca_id" id="marca_id" class="form-control form-control-alternative{{ $errors->has('marca_id') ? ' is-invalid' : '' }}">
                                    <option value="">--Seleccione--</option>
                                    @foreach ($marcas as $marca)
                                    <option value="{{ $marca['id'] }}">{{ $marca['nombre'] }}</option>
                
                                    @endforeach
                                </select>
                                @if ($errors->has('marca_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marca_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                                <div class="form-group col-md-3{{ $errors->has('estado') ? ' has-danger' : '' }}">
                                    <label for="estado">Estado:</label>
                                    <select class="form-control" id="estado" name="estado">
                                    <option value="Pendiente">Activo</option>
                                    <option value="Entregado">Inactivo</option>
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
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection


  </div>