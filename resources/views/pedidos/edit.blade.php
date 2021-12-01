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
            <h5 class="title">{{__(" editar Pedidos")}}</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('pedidos.update', $pedidos->id) }}" class="form-horizontal">
                @csrf 
                @method('PUT')
                <input type="hidden" name="_method" value="DELETE">
              <div class="row">
              </div>
              <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                <label>{{ _('codigo') }}</label>
                <input type="text" name="codigo" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" placeholder="{{ _('codigo') }}"  value="{{ old('codigo', $pedidos->codigo) }}">
                @include('alerts.feedback', ['field' => 'codigo'])
            </div>

            <div class="form-group{{ $errors->has('fechaEnvio') ? ' has-danger' : '' }}">
                <label>{{ _('Fecha Envio ') }}</label>
                <input type="date" name="fechaEnvio" class="form-control{{ $errors->has('fechaEnvio') ? ' is-invalid' : '' }}" placeholder="{{ _('fecha de envio') }}"  value="{{ old('fechaEnvio', $pedidos->fechaEnvio) }}">
                @include('alerts.feedback', ['field' => 'fechaEnvio'])
            </div>
            <div class="form-group{{ $errors->has('material_id') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('material_id') }}</label>
                <select name="material_id" id="material_id" class="form-control form-control-alternative{{ $errors->has('material_id') ? ' is-invalid' : '' }}">
                    <option value="">--Escoja  el material --</option>
                    @foreach ($materiales as $material )
                        <option value="{{ $material->id }}" {{ $material->id == $pedidos->material_id ? "selected" : "" }} >{{ $material->nombre }}</option>
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
                <input type="text" name="cantidad" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Cantidad ') }}" value="{{ old('cantidad', $pedidos->cantidad) }}">

                @if ($errors->has('cantidad'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cantidad') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('descripcion') }}</label>
                <input type="text" name="descripcion" id="input-name" class="form-control form-control-alternative{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" value="{{ old('descripcion', $pedidos->descripcion) }}">

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
                <br>
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <input class="btn btn-warning" type="submit" value="Editar Pedido" name="Enviar" >

            </form>
          </div>

      </div>
    </div>
    </div>
  </div>
@endsection
