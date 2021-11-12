@extends('layouts.main', [
    'namePage' => 'materiales',
    'class' => 'sidebar-mini',
    'activePage' => 'materiales',
  ])

@section('content')

<div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-orange border-1">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Editar Materiales') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('materiales.update', $material->id ) }}" method="post"   class="form-horizontal">
                @csrf
                @method('PUT')
                <h6 class="heading-small text-muted mb-4">{{ __(' information') }}</h6>

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
                        <div class="form-group col-md-6{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                            <input type="text" name="nombre" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre de la marca ') }}"
                            value="
                                    @foreach ($material as $material )
                                        {{ old('nombre', $material->nombre )}}
                                    @endforeach
                                   ">

                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-6{{ $errors->has('peso') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('peso') }}</label>
                            <input type="text" name="peso" id="input-name" class="form-control form-control-alternative{{ $errors->has('peso') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el peso de la marca ') }}" value="{{ old('peso', $material) }}" autofocus>

                            @if ($errors->has('peso'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('peso') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        <div class="form-group{{ $errors->has('tamaño') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('tamaño') }}</label>
                            <input type="text" name="tamaño" id="input-name" class="form-control form-control-alternative{{ $errors->has('tamaño') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el tamaño de la marca ') }}" value="{{ old('tamaño', $material) }}" autofocus>

                            @if ($errors->has('tamaño'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tamaño') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('cantidad') }}</label>
                            <input type="text" name="cantidad" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el cantidade de la marca ') }}" value="{{ old('cantidad', $material) }}" autofocus>

                            @if ($errors->has('cantidad'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cantidad') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4{{ $errors->has('tipo_id') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('tipo_id') }}</label>
                            <select name="tipo_id" id="tipo_id" class="form-control form-control-alternative{{ $errors->has('tipo_id') ? ' is-invalid' : '' }}">
                                <option value="">--Escoja la categoria--</option>
                                @foreach ($tipos as $tipo )
                                    <option value="{{ $tipo->id }}" {{ $tipo->id == $material->tipo_id ? "selected" : "" }} >{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('tipo_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tipo_id') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group col-md-4{{ $errors->has('marca_id') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('marca_id') }}</label>
                            <select name="marca_id" id="marca_id" class="form-control form-control-alternative{{ $errors->has('marca_id') ? ' is-invalid' : '' }}">
                                <option value="">--Escoja la categoria--</option>
                                @if (count($material))
                                @foreach ($marcas as $marca )

                                    <option value="{{ $marca->id }}" {{ $marca->id == $material->marca_id ? "selected" : "" }} >{{ $marca->nombre }}</option>

                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('marca_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('marca_id') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group col-md-4">
                        <div class="form-group{{ $errors->has('proveedor_id') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('proveedor_id') }}</label>
                            <select name="proveedor_id" id="marca_id" class="form-control form-control-alternative{{ $errors->has('proveedor_id') ? ' is-invalid' : '' }}">
                                <option value="">--Escoja la categoria--</option>
                                @if (count($material))
                                @foreach ($proveedores as $proveedor )

                                    <option value="{{ $proveedor->id }}" {{ $proveedor->id == $material->proveedor_id ? "selected" : "" }} >{{ $proveedor->nombre }}</option>

                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('proveedor_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('proveedor_id') }}</strong>
                                </span>
                            @endif

                        </div>
                        </div>
                    </div>
                        <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('estado') }}</label>
                            <input type="text" name="estado" id="input-name" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el proveedor de la marca ') }}" value="{{ old('estado', $material) }}" autofocus>

                            @if ($errors->has('estado'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">{{ __('Actualizar') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr class="my-4" />
        </div>
    </div>
</div>

@endsection
