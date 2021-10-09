@extends('layouts.main', ['title' => __(' Obra')])

@section('content')


<div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-orange border-1">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __(' Obra') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('obras.store') }}" method="POST"   class="form-horizontal">
                @csrf


                <h6 class="heading-small text-muted mb-4">{{ __(' Formulario de Obra') }}</h6>

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
                    <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('cantidad') }}</label>
                        <input type="text" name="cantidad" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el cantidade de la marca ') }}" value="{{ old('cantidad') }}" autofocus>

                        @if ($errors->has('cantidad'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cantidad') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('cliente_id') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('cliente_id') }}</label>
                        <select name="cliente_id" id="cliente_id" class="form-control form-control-alternative{{ $errors->has('cliente_id') ? ' is-invalid' : '' }}">
                            <option value="">--Escoja la --</option>
                            @foreach ($clientes as $cliente)
                            <option value="{{ $cliente['id'] }}">{{ $cliente['nombre'] }}</option>

                            @endforeach
                        </select>
                        @if ($errors->has('cliente_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cliente_id') }}</strong>
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
    </div>
</div>


@endsection