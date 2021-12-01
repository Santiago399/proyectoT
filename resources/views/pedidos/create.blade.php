@extends('layouts.main', [
    'class' => 'sidebar-mini ',
    'namePage' => 'pedidos',
    'activePage' => 'pedidos',
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
            <h5 class="title">{{__(" Crear Pedidos")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('pedidos.store') }}" class="form-horizontal"
            enctype="multipart/form-data">
              @csrf
              <div class="row">
              </div>
              <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                <label>{{ _('codigo') }}</label>
                <input type="text" name="codigo" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" placeholder="{{ _('Nombre') }}" value="{{ old('codigo') }}" autofocus>
                @include('alerts.feedback', ['field' => 'codigo'])
            </div>

            <div class="form-group{{ $errors->has('fechaEnvio') ? ' has-danger' : '' }}">
                <label>{{ _('Fecha Envio ') }}</label>
                <input type="date" name="fechaEnvio" class="form-control{{ $errors->has('fechaEnvio') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo') }}" value="{{ old('fechaEnvio') }}" autofocus>
                @include('alerts.feedback', ['field' => 'fechaEnvio'])
            </div>
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
            <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('cantidad') }}</label>
                <input type="text" name="cantidad" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el proveedor de la marca ') }}" value="{{ old('cantidad') }}" autofocus>

                @if ($errors->has('cantidad'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cantidad') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('descripcion') }}</label>
                <input type="text" name="descripcion" id="input-name" class="form-control form-control-alternative{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el proveedor de la marca ') }}" value="{{ old('descripcion') }}" autofocus>

                @if ($errors->has('descripcion'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('descripcion') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label for="estado">Estado del pedido:</label>
                <select class="form-control" id="estado" name="estado">
                <option value="Pendiente">Pendiente</option>
                <option value="Entregado">Entregado</option>
                <option value="Cancelado">Cancelado</option>
              </select>
              </div>
         </div>
                <hr class="half-rule"/>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Guardar')}}</button>
              </div>

            </form>
          </div>

      </div>
    </div>
    </div>
  </div>
@endsection
