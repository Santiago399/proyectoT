@extends('layouts.main', ['page' => __('Obras'), 'pageSlug' => 'Obras'])

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="title">{{ _('Crear Obra') }}</h5>
    </div>
    <form action="{{ route('obras.store') }}" method="POST" class="form-horizontal">
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
                <input type="text" name="nombre" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre de la marca ') }}" value="{{ old('nombre') }}" autofocus>

                @if ($errors->has('nombre'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('fechaInicio') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('fechaInicio') }}</label>
                <input type="date" name="fechaInicio" id="input-name" class="form-control form-control-alternative{{ $errors->has('fechaInicio') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el fechaInicio de la marca ') }}" value="{{ old('fechaInicio') }}" autofocus>

                @if ($errors->has('fechaInicio'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fechaInicio') }}</strong>
                    </span>
                @endif
            </div>
            <div classform-g="roup{{ $errors->has('fechaEntrega') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('fechaEntrega') }}</label>
                <input type="date" name="fechaEntrega" id="input-name" class="form-control form-control-alternative{{ $errors->has('fechaEntrega') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el tamaño de la marca ') }}" value="{{ old('fechaEntrega') }}" autofocus>

                @if ($errors->has('fechaEntrega'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fechaEntrega') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('estado') }}</label>
                <input type="text" name="estado" id="input-name" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el proveedor de la marca ') }}" value="{{ old('estado') }}" autofocus>

                @if ($errors->has('estado'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('estado') }}</strong>
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
            <div class="form-group{{ $errors->has('categoria_id') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('categoria_id') }}</label>
                <select name="categoria_id" id="categoria_id" class="form-control form-control-alternative{{ $errors->has('categoria_id') ? ' is-invalid' : '' }}">
                    <option value="">--Escoja la categoria--</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}</option>

                    @endforeach
                </select>
                @if ($errors->has('categoria_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('categoria_id') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group{{ $errors->has('usuario_id') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('usuario_id') }}</label>
                <select name="usuario_id" id="usuario_id" class="form-control form-control-alternative{{ $errors->has('usuario_id') ? ' is-invalid' : '' }}">
                    <option value="">--Escoja la --</option>
                    @foreach ($usuarios as $user)
                    <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>

                    @endforeach
                </select>
                @if ($errors->has('usuario_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('usuario_id') }}</strong>
                    </span>
                @endif

            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
            </div>
        </div>

    </form>
    <hr class="my-4" />
</div>

@endsection
